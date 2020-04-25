/*
 * This is a standalone script. Don't include it with other
 * scripts from the Scripts directory, or you will get name
 * clashes with other functions and variables.
 */

var DebugMe = 0;
var WindowList = new Array();
var RequestTimeOut = 5000;	// Our server is somewhat unresponsive

/*
 * Browser-specific function to return a request object.
 */
function getXmlHttpObject()
{
  if (window.XMLHttpRequest)
  {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    return new XMLHttpRequest();
  }
  if (window.ActiveXObject)
  {
    // code for IE6, IE5
    return new ActiveXObject("Microsoft.XMLHTTP");
  }
  return null;
}

/*
 * Fetch a response string from a specified URL.  The string is in CSV
 * format.  Split the string into an array, removing the leading element
 * (which has the response code).  Remove bracketing quotes from any
 * response elements.  Return the resultant array.  Errors return null.
 *
 * This function is synchronous. It doesn't return until the answer is
 * available.
 */
function fetchResponseCSV(url) {
  var response = null;
  var xo = getXmlHttpObject();
  if (xo) {
    if (DebugMe > 0) alert('Calling URL "' + url + '"');
    xo.open("GET", url, false);
    xo._timeout = setTimeout(function() { xo.abort(); }, 3000);
    xo.send(null);
    if (xo.status == 200) {
      if (DebugMe > 0) alert('Response received. Formatting result.');
      response = formatResponseCSV(xo);
    }
    else if (DebugMe > 0) alert('URL "' +url+ '" returned status ' + xo.status + ' from the server.');
  }
  else if (DebugMe > 0) alert('Failed to get request memory; cannot send request.');
  return response;
}

/*
 * Fetch a response string from a specified URL.  Set a caller-supplied
 * function to handle request completion.
 *
 * This function is asynchronous. It returns right away, and depends on
 * the callback function to load results.
 */
function fetchResponseAsync(url, cbfn, data, abortfn) {
  var xo = getXmlHttpObject();
  if (xo) {
    if (DebugMe > 0) alert('Calling URL "' + url + '"');
    xo._thisURL  = url;
    xo._userData = data;
    xo.onreadystatechange = cbfn;
    xo._timeout = setTimeout(function() { abortfn(xo); }, RequestTimeOut);
    xo.open("GET", url, true);
    xo.send(null);
  }
  else alert('Failed to get memory; cannot send request for "' + url + '".');
  return;
}

/*
 * Given an XML object that is fully materialized and which represents
 * a CSV string, format the string into an array.  The first element
 * is a response status; we remove that from the result, and if it is
 * not '200' we return nothing.  From the rest of the elements, we
 * remove any enclosing double quotes, and convert %22 into '"' and
 * %2C into ','.
 *
 * On success, our result is an array of arrays. The outer array is the
 * rows, the inner arrays are the columns.  On failure we return null.
 */
function formatResponseCSV(xo)
{
  if (xo.readyState != 4) return null;
  if (xo.status != 200) return null;

  if (DebugMe > 0) alert(xo.responseText);

  // Split on newlines; throw away a trailing empty element.  The result
  // is an array whose first element is a status, which we check to see
  // if the query succeeded.
  var t = xo.responseText.split('\n');
  if (t[t.length - 1] == '') t.length--;
  if (t[0] != '200') {
    if (DebugMe > 0) alert('Query failure. Response code=[' + t[0] | ']');
    return null;
  }

  // Now remove the response code from the list of elements to format.
  for (var i = 1; i < t.length; i++)
    t[i-1] = t[i];
  t.length--;

  // Now split the elements of t[] into arrays of columns.
  for (var tl = 0 ; tl < t.length; tl++) {
    var r = t[tl].split(/,/);
    for (var i = 0; i < r.length; i++) {
      // Join columns that were accidentally split on embedded commas
      while (r[i].match(/^".*[^"]$/)) {
        r[i] = r[i] + ',' + r[i+1];
        for (var j = i+2; j < r.length; j++)
          r[j-1] = r[j];
        r.length--;
      }
      // Remove enclosing quotes
      if (r[i].match(/^".*"$/)) {
        r[i] = r[i].replace(/^"(.*)"$/, '$1');
        r[i] = r[i].replace(/""/g, '"');
      }
      if (DebugMe > 1) alert('t['+tl+']['+i+']={' + r[i] + '}');
    }
    t[tl] = r;
  }

  return t;
}

/*
 * Receive a url and a window name.  If a window named 'name' does not exist,
 * Open a new popup window and add it to a list of currently open windows.
 * If it does exist, bring it to the front; and if the supplied URL is not its
 * current location, redirect it.
 *   This function returns nothing, so as not to redirect its calling window.
 */
function openWindow(url, name)
{
  if (url == null) url = '';
  if (name == null) name = '';
  var opts = 'status=1,resize=1,toolbar=1,scrollbars=1,location=1,resizable=1,menubar=1,height=550,width=450';
  for (var i = 0; i < WindowList.length; i++)
  {
    var w = WindowList[i][2];
    if (WindowList[i][0] == name)
    {
      // This is the window we're looking for.
      if (w.closed)
      {
        // Reopen a window the user closed.
        WindowList[i][1] = url;
        WindowList[i][2] = window.open(url, name, opts);
      }
      else {
        // The window is already open.
        if (WindowList[i][1] != url) {
          // Redirect this window to the supplied location.
          w.location.href = url;
        }
        // Make sure this window is visible.
        w.focus();
      }
      break;
    }
  }
  if (i >= WindowList.length) {
    // Open a new window, then store its information.
    WindowList[i] = new Array(name, url, window.open(url, name, opts));
  }
  return;
}

