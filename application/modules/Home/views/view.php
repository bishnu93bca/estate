<?php
/* Ad hoc functions to make the examples marginally prettier.*/
function isWebRequest()
{
  return isset($_SERVER['HTTP_USER_AGENT']);
}
function pageHeader($title)
{
  $ret = "<!doctype html>
  <html>
  <head>
    <title>" . $title . "</title>
    <link href='styles/style.css' rel='stylesheet' type='text/css' />
  </head>
  <body>\n";
  if ($_SERVER['PHP_SELF'] != "/index.php") {
    $ret .= "<p><a href='index.php'>Back</a></p>";
  }
  $ret .= "<header><h1>" . $title . "</h1></header>";
 // Start the session (for storing access tokens and things)
  if (!headers_sent()) {
    session_start();
  }
  return $ret;
}
function pageFooter($file = null)
{
  $ret = "";
  if ($file) {
    $ret .= "<h3>Code:</h3>";
    $ret .= "<pre class='code'>";
    $ret .= htmlspecialchars(file_get_contents($file));
    $ret .= "</pre>";
  }
  $ret .= "</html>";
  return $ret;
}
function missingApiKeyWarning()
{
  $ret = "
    <h3 class='warn'>
      Warning: You need to set a Simple API Access key from the
      <a href='http://developers.google.com/console'>Google API console</a>
    </h3>";
  return $ret;
}
function missingClientSecretsWarning()
{
  $ret = "
    <h3 class='warn'>
      Warning: You need to set Client ID, Client Secret and Redirect URI from the
      <a href='http://developers.google.com/console'>Google API console</a>
    </h3>";
  return $ret;
}
function missingServiceAccountDetailsWarning()
{
  $ret = "
    <h3 class='warn'>
      Warning: You need download your Service Account Credentials JSON from the
      <a href='http://developers.google.com/console'>Google API console</a>.
    </h3>
    <p>
      Once downloaded, move them into the root directory of this repository and
      rename them 'service-account-credentials.json'.
    </p>
    <p>
      In your application, you should set the GOOGLE_APPLICATION_CREDENTIALS environment variable
      as the path to this file, but in the context of this example we will do this for you.
    </p>";
  return $ret;
}
function missingOAuth2CredentialsWarning()
{
  $ret = "
    <h3 class='warn'>
      Warning: You need to set the location of your OAuth2 Client Credentials from the
      <a href='http://developers.google.com/console'>Google API console</a>.
    </h3>
    <p>
      Once downloaded, move them into the root directory of this repository and
      rename them 'oauth-credentials.json'.
    </p>";
  return $ret;
}
function invalidCsrfTokenWarning()
{
  $ret = "
    <h3 class='warn'>
      The CSRF token is invalid, your session probably expired. Please refresh the page.
    </h3>";
  return $ret;
}
function checkServiceAccountCredentialsFile()
{
  // service account creds
  $application_creds = __DIR__ . '/../../service-account-credentials.json';
  return file_exists($application_creds) ? $application_creds : false;
}
function getCsrfToken()
{
  if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(openssl_random_pseudo_bytes(32));
  }
  return $_SESSION['csrf_token'];
}
function validateCsrfToken()
{
  return isset($_REQUEST['csrf_token'])
      && isset($_SESSION['csrf_token'])
      && $_REQUEST['csrf_token'] === $_SESSION['csrf_token'];
}
function getOAuthCredentialsFile()
{
  // oauth2 creds
  $oauth_creds = __DIR__ . '/../../oauth-credentials.json';
  if (file_exists($oauth_creds)) {
    return $oauth_creds;
  }
  return false;
}
function setClientCredentialsFile($apiKey)
{
  $file = __DIR__ . '/../../tests/.apiKey';
  file_put_contents($file, $apiKey);
}
function getApiKey()
{
  $file = __DIR__ . '/../../tests/.apiKey';
  if (file_exists($file)) {
    return file_get_contents($file);
  }
}
function setApiKey($apiKey)
{
  $file = __DIR__ . '/../../tests/.apiKey';
  file_put_contents($file, $apiKey);
}










 if (!isWebRequest()): ?>
  To view this example, run the following command from the root directory of this repository:

    php -S localhost:8080 -t examples/

  And then browse to "localhost:8080" in your web browser
<?php return ?>
<?php endif ?>

<?= pageHeader("PHP Library Examples"); ?>

<?php if (isset($_POST['api_key'])): ?>
<?php setApiKey($_POST['api_key']) ?>
<span class="warn">
  API Key set!
</span>
<?php endif ?>

<?php if (!getApiKey()): ?>
<div class="api-key">
  <strong>You have not entered your API key</strong>
  <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
    API Key:<input type="text" name="api_key" placeholder="API-Key" required/>
    <input type="submit" value="Set API-Key"/>
  </form>
  <em>This can be found in the <a href="http://developers.google.com/console" target="_blank">Google API Console</em>
</div>
<?php endif ?>

<ul>
  <li><a href="simple-query.php">A query using simple API access</a></li>
  <li><a href="url-shortener.php">Authorize a url shortener, using OAuth 2.0 authentication.</a></li>
  <li><a href="batch.php">An example of combining multiple calls into a batch request</a></li>
  <li><a href="service-account.php">A query using the service account functionality.</a></li>
  <li><a href="simple-file-upload.php">An example of a small file upload.</a></li>
  <li><a href="large-file-upload.php">An example of a large file upload.</a></li>
  <li><a href="large-file-download.php">An example of a large file download.</a></li>
  <li><a href="idtoken.php">An example of verifying and retrieving the id token.</a></li>
  <li><a href="multi-api.php">An example of using multiple APIs.</a></li>
</ul>

<?= pageFooter(); ?>