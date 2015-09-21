<?php
/**
 * PHPMailer - PHP email creation and transport class.
<<<<<<< HEAD
 * PHP Version 5.0.0
 * Version 5.2.7
 * @package PHPMailer
 * @link https://github.com/PHPMailer/PHPMailer/
 * @author Marcus Bointon (coolbru) <phpmailer@synchromedia.co.uk>
 * @author Jim Jagielski (jimjag) <jimjag@gmail.com>
 * @author Andy Prevost (codeworxtech) <codeworxtech@users.sourceforge.net>
 * @author Brent R. Matzelle (original founder)
 * @copyright 2013 Marcus Bointon
=======
 * PHP Version 5
 * @package PHPMailer
 * @link https://github.com/PHPMailer/PHPMailer/ The PHPMailer GitHub project
 * @author Marcus Bointon (Synchro/coolbru) <phpmailer@synchromedia.co.uk>
 * @author Jim Jagielski (jimjag) <jimjag@gmail.com>
 * @author Andy Prevost (codeworxtech) <codeworxtech@users.sourceforge.net>
 * @author Brent R. Matzelle (original founder)
 * @copyright 2012 - 2014 Marcus Bointon
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
 * @copyright 2010 - 2012 Jim Jagielski
 * @copyright 2004 - 2009 Andy Prevost
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * @note This program is distributed in the hope that it will be useful - WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.
 */

<<<<<<< HEAD
if (version_compare(PHP_VERSION, '5.0.0', '<')) {
    exit("Sorry, PHPMailer will only run on PHP version 5 or greater!\n");
}

/**
 * PHPMailer - PHP email creation and transport class.
 * PHP Version 5.0.0
 * @package PHPMailer
 * @author Marcus Bointon (coolbru) <phpmailer@synchromedia.co.uk>
 * @author Jim Jagielski (jimjag) <jimjag@gmail.com>
 * @author Andy Prevost (codeworxtech) <codeworxtech@users.sourceforge.net>
 * @author Brent R. Matzelle (original founder)
 * @copyright 2013 Marcus Bointon
 * @copyright 2010 - 2012 Jim Jagielski
 * @copyright 2004 - 2009 Andy Prevost
=======
/**
 * PHPMailer - PHP email creation and transport class.
 * @package PHPMailer
 * @author Marcus Bointon (Synchro/coolbru) <phpmailer@synchromedia.co.uk>
 * @author Jim Jagielski (jimjag) <jimjag@gmail.com>
 * @author Andy Prevost (codeworxtech) <codeworxtech@users.sourceforge.net>
 * @author Brent R. Matzelle (original founder)
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
 */
class PHPMailer
{
    /**
     * The PHPMailer Version number.
     * @type string
     */
<<<<<<< HEAD
    public $Version = '5.2.7';
=======
    public $Version = '5.2.10';
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

    /**
     * Email priority.
     * Options: 1 = High, 3 = Normal, 5 = low.
<<<<<<< HEAD
     * @type int
=======
     * @type integer
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    public $Priority = 3;

    /**
     * The character set of the message.
     * @type string
     */
    public $CharSet = 'iso-8859-1';

    /**
     * The MIME Content-type of the message.
     * @type string
     */
    public $ContentType = 'text/plain';

    /**
     * The message encoding.
     * Options: "8bit", "7bit", "binary", "base64", and "quoted-printable".
     * @type string
     */
    public $Encoding = '8bit';

    /**
     * Holds the most recent mailer error message.
     * @type string
     */
    public $ErrorInfo = '';

    /**
     * The From email address for the message.
     * @type string
     */
    public $From = 'root@localhost';

    /**
     * The From name of the message.
     * @type string
     */
    public $FromName = 'Root User';

    /**
     * The Sender email (Return-Path) of the message.
     * If not empty, will be sent via -f to sendmail or as 'MAIL FROM' in smtp mode.
     * @type string
     */
    public $Sender = '';

    /**
     * The Return-Path of the message.
     * If empty, it will be set to either From or Sender.
     * @type string
<<<<<<< HEAD
=======
     * @deprecated Email senders should never set a return-path header;
     * it's the receiver's job (RFC5321 section 4.4), so this no longer does anything.
     * @link https://tools.ietf.org/html/rfc5321#section-4.4 RFC5321 reference
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    public $ReturnPath = '';

    /**
     * The Subject of the message.
     * @type string
     */
    public $Subject = '';

    /**
     * An HTML or plain text message body.
     * If HTML then call isHTML(true).
     * @type string
     */
    public $Body = '';

    /**
     * The plain-text message body.
     * This body can be read by mail clients that do not have HTML email
     * capability such as mutt & Eudora.
     * Clients that can read HTML will view the normal Body.
     * @type string
     */
    public $AltBody = '';

    /**
     * An iCal message part body.
     * Only supported in simple alt or alt_inline message types
     * To generate iCal events, use the bundled extras/EasyPeasyICS.php class or iCalcreator
     * @link http://sprain.ch/blog/downloads/php-class-easypeasyics-create-ical-files-with-php/
     * @link http://kigkonsult.se/iCalcreator/
     * @type string
     */
    public $Ical = '';

    /**
     * The complete compiled MIME message body.
     * @access protected
     * @type string
     */
    protected $MIMEBody = '';

    /**
     * The complete compiled MIME message headers.
     * @type string
     * @access protected
     */
    protected $MIMEHeader = '';

    /**
     * Extra headers that createHeader() doesn't fold in.
     * @type string
     * @access protected
     */
    protected $mailHeader = '';

    /**
     * Word-wrap the message body to this number of chars.
<<<<<<< HEAD
     * @type int
=======
     * Set to 0 to not wrap. A useful value here is 78, for RFC2822 section 2.1.1 compliance.
     * @type integer
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    public $WordWrap = 0;

    /**
     * Which method to use to send mail.
     * Options: "mail", "sendmail", or "smtp".
     * @type string
     */
    public $Mailer = 'mail';

    /**
     * The path to the sendmail program.
     * @type string
     */
    public $Sendmail = '/usr/sbin/sendmail';

    /**
     * Whether mail() uses a fully sendmail-compatible MTA.
     * One which supports sendmail's "-oi -f" options.
<<<<<<< HEAD
     * @type bool
=======
     * @type boolean
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    public $UseSendmailOptions = true;

    /**
     * Path to PHPMailer plugins.
     * Useful if the SMTP class is not in the PHP include path.
     * @type string
     * @deprecated Should not be needed now there is an autoloader.
     */
    public $PluginDir = '';

    /**
     * The email address that a reading confirmation should be sent to.
     * @type string
     */
    public $ConfirmReadingTo = '';

    /**
     * The hostname to use in Message-Id and Received headers
     * and as default HELO string.
     * If empty, the value returned
     * by SERVER_NAME is used or 'localhost.localdomain'.
     * @type string
     */
    public $Hostname = '';

    /**
     * An ID to be used in the Message-Id header.
     * If empty, a unique id will be generated.
     * @type string
     */
    public $MessageID = '';

    /**
     * The message Date to be used in the Date header.
     * If empty, the current date will be added.
     * @type string
     */
    public $MessageDate = '';

    /**
     * SMTP hosts.
     * Either a single hostname or multiple semicolon-delimited hostnames.
     * You can also specify a different port
     * for each host by using this format: [hostname:port]
     * (e.g. "smtp1.example.com:25;smtp2.example.com").
<<<<<<< HEAD
=======
     * You can also specify encryption type, for example:
     * (e.g. "tls://smtp1.example.com:587;ssl://smtp2.example.com:465").
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     * Hosts will be tried in order.
     * @type string
     */
    public $Host = 'localhost';

    /**
     * The default SMTP server port.
<<<<<<< HEAD
     * @type int
     * @Todo Why is this needed when the SMTP class takes care of it?
=======
     * @type integer
     * @TODO Why is this needed when the SMTP class takes care of it?
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    public $Port = 25;

    /**
     * The SMTP HELO of the message.
     * Default is $Hostname.
     * @type string
     * @see PHPMailer::$Hostname
     */
    public $Helo = '';

    /**
<<<<<<< HEAD
     * The secure connection prefix.
     * Options: "", "ssl" or "tls"
=======
     * What kind of encryption to use on the SMTP connection.
     * Options: '', 'ssl' or 'tls'
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     * @type string
     */
    public $SMTPSecure = '';

    /**
<<<<<<< HEAD
     * Whether to use SMTP authentication.
     * Uses the Username and Password properties.
     * @type bool
=======
     * Whether to enable TLS encryption automatically if a server supports it,
     * even if `SMTPSecure` is not set to 'tls'.
     * Be aware that in PHP >= 5.6 this requires that the server's certificates are valid.
     * @type boolean
     */
    public $SMTPAutoTLS = true;

    /**
     * Whether to use SMTP authentication.
     * Uses the Username and Password properties.
     * @type boolean
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     * @see PHPMailer::$Username
     * @see PHPMailer::$Password
     */
    public $SMTPAuth = false;

    /**
<<<<<<< HEAD
=======
     * Options array passed to stream_context_create when connecting via SMTP.
     * @type array
     */
    public $SMTPOptions = array();

    /**
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     * SMTP username.
     * @type string
     */
    public $Username = '';

    /**
     * SMTP password.
     * @type string
     */
    public $Password = '';

    /**
     * SMTP auth type.
     * Options are LOGIN (default), PLAIN, NTLM, CRAM-MD5
     * @type string
     */
    public $AuthType = '';

    /**
     * SMTP realm.
     * Used for NTLM auth
     * @type string
     */
    public $Realm = '';

    /**
     * SMTP workstation.
     * Used for NTLM auth
     * @type string
     */
    public $Workstation = '';

    /**
     * The SMTP server timeout in seconds.
<<<<<<< HEAD
     * @type int
     */
    public $Timeout = 10;

    /**
     * SMTP class debug output mode.
     * Options: 0 = off, 1 = commands, 2 = commands and data
     * @type int
=======
     * Default of 5 minutes (300sec) is from RFC2821 section 4.5.3.2
     * @type integer
     */
    public $Timeout = 300;

    /**
     * SMTP class debug output mode.
     * Debug output level.
     * Options:
     * * `0` No output
     * * `1` Commands
     * * `2` Data and commands
     * * `3` As 2 plus connection status
     * * `4` Low-level data output
     * @type integer
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     * @see SMTP::$do_debug
     */
    public $SMTPDebug = 0;

    /**
<<<<<<< HEAD
     * The function/method to use for debugging output.
     * Options: "echo" or "error_log"
     * @type string
     * @see SMTP::$Debugoutput
     */
    public $Debugoutput = "echo";
=======
     * How to handle debug output.
     * Options:
     * * `echo` Output plain-text as-is, appropriate for CLI
     * * `html` Output escaped, line breaks converted to `<br>`, appropriate for browser output
     * * `error_log` Output to error log as configured in php.ini
     *
     * Alternatively, you can provide a callable expecting two params: a message string and the debug level:
     * <code>
     * $mail->Debugoutput = function($str, $level) {echo "debug level $level; message: $str";};
     * </code>
     * @type string|callable
     * @see SMTP::$Debugoutput
     */
    public $Debugoutput = 'echo';
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

    /**
     * Whether to keep SMTP connection open after each message.
     * If this is set to true then to close the connection
     * requires an explicit call to smtpClose().
<<<<<<< HEAD
     * @type bool
=======
     * @type boolean
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    public $SMTPKeepAlive = false;

    /**
     * Whether to split multiple to addresses into multiple messages
     * or send them all in one message.
<<<<<<< HEAD
     * @type bool
=======
     * @type boolean
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    public $SingleTo = false;

    /**
     * Storage for addresses when SingleTo is enabled.
     * @type array
<<<<<<< HEAD
     * @todo This should really not be public
=======
     * @TODO This should really not be public
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    public $SingleToArray = array();

    /**
     * Whether to generate VERP addresses on send.
     * Only applicable when sending via SMTP.
     * @link http://en.wikipedia.org/wiki/Variable_envelope_return_path
<<<<<<< HEAD
     * @type bool
=======
     * @link http://www.postfix.org/VERP_README.html Postfix VERP info
     * @type boolean
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    public $do_verp = false;

    /**
     * Whether to allow sending messages with an empty body.
<<<<<<< HEAD
     * @type bool
=======
     * @type boolean
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    public $AllowEmpty = false;

    /**
     * The default line ending.
     * @note The default remains "\n". We force CRLF where we know
     *        it must be used via self::CRLF.
     * @type string
     */
    public $LE = "\n";

    /**
     * DKIM selector.
     * @type string
     */
    public $DKIM_selector = '';

    /**
     * DKIM Identity.
     * Usually the email address used as the source of the email
     * @type string
     */
    public $DKIM_identity = '';

    /**
     * DKIM passphrase.
     * Used if your key is encrypted.
     * @type string
     */
    public $DKIM_passphrase = '';

    /**
     * DKIM signing domain name.
     * @example 'example.com'
     * @type string
     */
    public $DKIM_domain = '';

    /**
     * DKIM private key file path.
     * @type string
     */
    public $DKIM_private = '';

    /**
     * Callback Action function name.
     *
     * The function that handles the result of the send email action.
     * It is called out by send() for each email sent.
     *
<<<<<<< HEAD
     * Value can be:
     * - 'function_name' for function names
     * - 'Class::Method' for static method calls
     * - array($object, 'Method') for calling methods on $object
     * See http://php.net/is_callable manual page for more details.
     *
     * Parameters:
     *   bool    $result        result of the send action
=======
     * Value can be any php callable: http://www.php.net/is_callable
     *
     * Parameters:
     *   boolean $result        result of the send action
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     *   string  $to            email address of the recipient
     *   string  $cc            cc email addresses
     *   string  $bcc           bcc email addresses
     *   string  $subject       the subject
     *   string  $body          the email body
     *   string  $from          email address of sender
<<<<<<< HEAD
     * 
=======
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     * @type string
     */
    public $action_function = '';

    /**
<<<<<<< HEAD
     * What to use in the X-Mailer header.
     * Options: null for default, whitespace for none, or a string to use
=======
     * What to put in the X-Mailer header.
     * Options: An empty string for PHPMailer default, whitespace for none, or a string to use
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     * @type string
     */
    public $XMailer = '';

    /**
     * An instance of the SMTP sender class.
     * @type SMTP
     * @access protected
     */
    protected $smtp = null;

    /**
     * The array of 'to' addresses.
     * @type array
     * @access protected
     */
    protected $to = array();

    /**
     * The array of 'cc' addresses.
     * @type array
     * @access protected
     */
    protected $cc = array();

    /**
     * The array of 'bcc' addresses.
     * @type array
     * @access protected
     */
    protected $bcc = array();

    /**
     * The array of reply-to names and addresses.
     * @type array
     * @access protected
     */
    protected $ReplyTo = array();

    /**
     * An array of all kinds of addresses.
<<<<<<< HEAD
     * Includes all of $to, $cc, $bcc, $replyto
=======
     * Includes all of $to, $cc, $bcc
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     * @type array
     * @access protected
     */
    protected $all_recipients = array();

    /**
     * The array of attachments.
     * @type array
     * @access protected
     */
    protected $attachment = array();

    /**
     * The array of custom headers.
     * @type array
     * @access protected
     */
    protected $CustomHeader = array();

    /**
     * The most recent Message-ID (including angular brackets).
     * @type string
     * @access protected
     */
    protected $lastMessageID = '';

    /**
     * The message's MIME type.
     * @type string
     * @access protected
     */
    protected $message_type = '';

    /**
     * The array of MIME boundary strings.
     * @type array
     * @access protected
     */
    protected $boundary = array();

    /**
     * The array of available languages.
     * @type array
     * @access protected
     */
    protected $language = array();

    /**
     * The number of errors encountered.
     * @type integer
     * @access protected
     */
    protected $error_count = 0;

    /**
     * The S/MIME certificate file path.
     * @type string
     * @access protected
     */
    protected $sign_cert_file = '';

    /**
     * The S/MIME key file path.
     * @type string
     * @access protected
     */
    protected $sign_key_file = '';

    /**
<<<<<<< HEAD
=======
     * The optional S/MIME extra certificates ("CA Chain") file path.
     * @type string
     * @access protected
     */
    protected $sign_extracerts_file = '';

    /**
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     * The S/MIME password for the key.
     * Used only if the key is encrypted.
     * @type string
     * @access protected
     */
    protected $sign_key_pass = '';

    /**
     * Whether to throw exceptions for errors.
<<<<<<< HEAD
     * @type bool
=======
     * @type boolean
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     * @access protected
     */
    protected $exceptions = false;

    /**
<<<<<<< HEAD
     * Error severity: message only, continue processing
=======
     * Unique ID used for message ID and boundaries.
     * @type string
     * @access protected
     */
    protected $uniqueid = '';

    /**
     * Error severity: message only, continue processing.
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    const STOP_MESSAGE = 0;

    /**
<<<<<<< HEAD
     * Error severity: message, likely ok to continue processing
=======
     * Error severity: message, likely ok to continue processing.
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    const STOP_CONTINUE = 1;

    /**
<<<<<<< HEAD
     * Error severity: message, plus full stop, critical error reached
=======
     * Error severity: message, plus full stop, critical error reached.
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    const STOP_CRITICAL = 2;

    /**
<<<<<<< HEAD
     * SMTP RFC standard line ending
=======
     * SMTP RFC standard line ending.
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    const CRLF = "\r\n";

    /**
<<<<<<< HEAD
     * Constructor
     * @param bool $exceptions Should we throw external exceptions?
     */
    public function __construct($exceptions = false)
    {
        $this->exceptions = ($exceptions == true);
=======
     * The maximum line length allowed by RFC 2822 section 2.1.1
     * @type integer
     */
    const MAX_LINE_LENGTH = 998;

    /**
     * Constructor.
     * @param boolean $exceptions Should we throw external exceptions?
     */
    public function __construct($exceptions = false)
    {
        $this->exceptions = (boolean)$exceptions;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
    }

    /**
     * Destructor.
     */
    public function __destruct()
    {
<<<<<<< HEAD
        if ($this->Mailer == 'smtp') { //close any open SMTP connection nicely
=======
        //Close any open SMTP connection nicely
        if ($this->Mailer == 'smtp') {
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            $this->smtpClose();
        }
    }

    /**
     * Call mail() in a safe_mode-aware fashion.
     * Also, unless sendmail_path points to sendmail (or something that
     * claims to be sendmail), don't pass params (not a perfect fix,
     * but it will do)
     * @param string $to To
     * @param string $subject Subject
     * @param string $body Message Body
     * @param string $header Additional Header(s)
     * @param string $params Params
     * @access private
<<<<<<< HEAD
     * @return bool
     */
    private function mailPassthru($to, $subject, $body, $header, $params)
    {
        if (ini_get('safe_mode') || !($this->UseSendmailOptions)) {
            $rt = @mail($to, $this->encodeHeader($this->secureHeader($subject)), $body, $header);
        } else {
            $rt = @mail($to, $this->encodeHeader($this->secureHeader($subject)), $body, $header, $params);
        }
        return $rt;
=======
     * @return boolean
     */
    private function mailPassthru($to, $subject, $body, $header, $params)
    {
        //Check overloading of mail function to avoid double-encoding
        if (ini_get('mbstring.func_overload') & 1) {
            $subject = $this->secureHeader($subject);
        } else {
            $subject = $this->encodeHeader($this->secureHeader($subject));
        }
        if (ini_get('safe_mode') || !($this->UseSendmailOptions)) {
            $result = @mail($to, $subject, $body, $header);
        } else {
            $result = @mail($to, $subject, $body, $header, $params);
        }
        return $result;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
    }

    /**
     * Output debugging info via user-defined method.
<<<<<<< HEAD
     * Only if debug output is enabled.
=======
     * Only generates output if SMTP debug output is enabled (@see SMTP::$do_debug).
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     * @see PHPMailer::$Debugoutput
     * @see PHPMailer::$SMTPDebug
     * @param string $str
     */
    protected function edebug($str)
    {
<<<<<<< HEAD
        if (!$this->SMTPDebug) {
=======
        if ($this->SMTPDebug <= 0) {
            return;
        }
        //Avoid clash with built-in function names
        if (!in_array($this->Debugoutput, array('error_log', 'html', 'echo')) and is_callable($this->Debugoutput)) {
            call_user_func($this->Debugoutput, $str, $this->SMTPDebug);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            return;
        }
        switch ($this->Debugoutput) {
            case 'error_log':
<<<<<<< HEAD
                error_log($str);
                break;
            case 'html':
                //Cleans up output a bit for a better looking display that's HTML-safe
                echo htmlentities(preg_replace('/[\r\n]+/', '', $str), ENT_QUOTES, $this->CharSet) . "<br>\n";
                break;
            case 'echo':
            default:
                //Just echoes exactly what was received
                echo $str;
=======
                //Don't output, just log
                error_log($str);
                break;
            case 'html':
                //Cleans up output a bit for a better looking, HTML-safe output
                echo htmlentities(
                    preg_replace('/[\r\n]+/', '', $str),
                    ENT_QUOTES,
                    'UTF-8'
                )
                . "<br>\n";
                break;
            case 'echo':
            default:
                //Normalize line breaks
                $str = preg_replace('/(\r\n|\r|\n)/ms', "\n", $str);
                echo gmdate('Y-m-d H:i:s') . "\t" . str_replace(
                    "\n",
                    "\n                   \t                  ",
                    trim($str)
                ) . "\n";
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        }
    }

    /**
     * Sets message type to HTML or plain.
<<<<<<< HEAD
     * @param bool $ishtml True for HTML mode.
     * @return void
     */
    public function isHTML($ishtml = true)
    {
        if ($ishtml) {
=======
     * @param boolean $isHtml True for HTML mode.
     * @return void
     */
    public function isHTML($isHtml = true)
    {
        if ($isHtml) {
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            $this->ContentType = 'text/html';
        } else {
            $this->ContentType = 'text/plain';
        }
    }

    /**
     * Send messages using SMTP.
     * @return void
     */
    public function isSMTP()
    {
        $this->Mailer = 'smtp';
    }

    /**
     * Send messages using PHP's mail() function.
     * @return void
     */
    public function isMail()
    {
        $this->Mailer = 'mail';
    }

    /**
     * Send messages using $Sendmail.
     * @return void
     */
    public function isSendmail()
    {
<<<<<<< HEAD
        if (!stristr(ini_get('sendmail_path'), 'sendmail')) {
            $this->Sendmail = '/var/qmail/bin/sendmail';
=======
        $ini_sendmail_path = ini_get('sendmail_path');

        if (!stristr($ini_sendmail_path, 'sendmail')) {
            $this->Sendmail = '/usr/sbin/sendmail';
        } else {
            $this->Sendmail = $ini_sendmail_path;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        }
        $this->Mailer = 'sendmail';
    }

    /**
     * Send messages using qmail.
     * @return void
     */
    public function isQmail()
    {
<<<<<<< HEAD
        if (stristr(ini_get('sendmail_path'), 'qmail')) {
            $this->Sendmail = '/var/qmail/bin/sendmail';
        }
        $this->Mailer = 'sendmail';
=======
        $ini_sendmail_path = ini_get('sendmail_path');

        if (!stristr($ini_sendmail_path, 'qmail')) {
            $this->Sendmail = '/var/qmail/bin/qmail-inject';
        } else {
            $this->Sendmail = $ini_sendmail_path;
        }
        $this->Mailer = 'qmail';
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
    }

    /**
     * Add a "To" address.
     * @param string $address
     * @param string $name
<<<<<<< HEAD
     * @return bool true on success, false if address already used
=======
     * @return boolean true on success, false if address already used
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    public function addAddress($address, $name = '')
    {
        return $this->addAnAddress('to', $address, $name);
    }

    /**
     * Add a "CC" address.
     * @note: This function works with the SMTP mailer on win32, not with the "mail" mailer.
     * @param string $address
     * @param string $name
<<<<<<< HEAD
     * @return bool true on success, false if address already used
=======
     * @return boolean true on success, false if address already used
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    public function addCC($address, $name = '')
    {
        return $this->addAnAddress('cc', $address, $name);
    }

    /**
     * Add a "BCC" address.
     * @note: This function works with the SMTP mailer on win32, not with the "mail" mailer.
     * @param string $address
     * @param string $name
<<<<<<< HEAD
     * @return bool true on success, false if address already used
=======
     * @return boolean true on success, false if address already used
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    public function addBCC($address, $name = '')
    {
        return $this->addAnAddress('bcc', $address, $name);
    }

    /**
     * Add a "Reply-to" address.
     * @param string $address
     * @param string $name
<<<<<<< HEAD
     * @return bool
=======
     * @return boolean
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    public function addReplyTo($address, $name = '')
    {
        return $this->addAnAddress('Reply-To', $address, $name);
    }

    /**
     * Add an address to one of the recipient arrays.
     * Addresses that have been added already return false, but do not throw exceptions
     * @param string $kind One of 'to', 'cc', 'bcc', 'ReplyTo'
     * @param string $address The email address to send to
     * @param string $name
     * @throws phpmailerException
<<<<<<< HEAD
     * @return bool true on success, false if address already used or invalid in some way
=======
     * @return boolean true on success, false if address already used or invalid in some way
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     * @access protected
     */
    protected function addAnAddress($kind, $address, $name = '')
    {
        if (!preg_match('/^(to|cc|bcc|Reply-To)$/', $kind)) {
            $this->setError($this->lang('Invalid recipient array') . ': ' . $kind);
<<<<<<< HEAD
            if ($this->exceptions) {
                throw new phpmailerException('Invalid recipient array: ' . $kind);
            }
            $this->edebug($this->lang('Invalid recipient array') . ': ' . $kind);
=======
            $this->edebug($this->lang('Invalid recipient array') . ': ' . $kind);
            if ($this->exceptions) {
                throw new phpmailerException('Invalid recipient array: ' . $kind);
            }
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            return false;
        }
        $address = trim($address);
        $name = trim(preg_replace('/[\r\n]+/', '', $name)); //Strip breaks and trim
        if (!$this->validateAddress($address)) {
            $this->setError($this->lang('invalid_address') . ': ' . $address);
<<<<<<< HEAD
            if ($this->exceptions) {
                throw new phpmailerException($this->lang('invalid_address') . ': ' . $address);
            }
            $this->edebug($this->lang('invalid_address') . ': ' . $address);
=======
            $this->edebug($this->lang('invalid_address') . ': ' . $address);
            if ($this->exceptions) {
                throw new phpmailerException($this->lang('invalid_address') . ': ' . $address);
            }
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            return false;
        }
        if ($kind != 'Reply-To') {
            if (!isset($this->all_recipients[strtolower($address)])) {
                array_push($this->$kind, array($address, $name));
                $this->all_recipients[strtolower($address)] = true;
                return true;
            }
        } else {
            if (!array_key_exists(strtolower($address), $this->ReplyTo)) {
                $this->ReplyTo[strtolower($address)] = array($address, $name);
                return true;
            }
        }
        return false;
    }

    /**
     * Set the From and FromName properties.
     * @param string $address
     * @param string $name
<<<<<<< HEAD
     * @param bool $auto Whether to also set the Sender address, defaults to true
     * @throws phpmailerException
     * @return bool
=======
     * @param boolean $auto Whether to also set the Sender address, defaults to true
     * @throws phpmailerException
     * @return boolean
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    public function setFrom($address, $name = '', $auto = true)
    {
        $address = trim($address);
        $name = trim(preg_replace('/[\r\n]+/', '', $name)); //Strip breaks and trim
        if (!$this->validateAddress($address)) {
            $this->setError($this->lang('invalid_address') . ': ' . $address);
<<<<<<< HEAD
            if ($this->exceptions) {
                throw new phpmailerException($this->lang('invalid_address') . ': ' . $address);
            }
            $this->edebug($this->lang('invalid_address') . ': ' . $address);
=======
            $this->edebug($this->lang('invalid_address') . ': ' . $address);
            if ($this->exceptions) {
                throw new phpmailerException($this->lang('invalid_address') . ': ' . $address);
            }
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            return false;
        }
        $this->From = $address;
        $this->FromName = $name;
        if ($auto) {
            if (empty($this->Sender)) {
                $this->Sender = $address;
            }
        }
        return true;
    }

    /**
     * Return the Message-ID header of the last email.
     * Technically this is the value from the last time the headers were created,
     * but it's also the message ID of the last sent message except in
     * pathological cases.
     * @return string
     */
    public function getLastMessageID()
    {
        return $this->lastMessageID;
    }

    /**
     * Check that a string looks like an email address.
     * @param string $address The email address to check
     * @param string $patternselect A selector for the validation pattern to use :
<<<<<<< HEAD
     *   'auto' - pick best one automatically;
     *   'pcre8' - use the squiloople.com pattern, requires PCRE > 8.0, PHP >= 5.3.2, 5.2.14;
     *   'pcre' - use old PCRE implementation;
     *   'php' - use PHP built-in FILTER_VALIDATE_EMAIL; faster, less thorough;
     *   'noregex' - super fast, really dumb.
     * @return bool
=======
     * * `auto` Pick strictest one automatically;
     * * `pcre8` Use the squiloople.com pattern, requires PCRE > 8.0, PHP >= 5.3.2, 5.2.14;
     * * `pcre` Use old PCRE implementation;
     * * `php` Use PHP built-in FILTER_VALIDATE_EMAIL; same as pcre8 but does not allow 'dotless' domains;
     * * `html5` Use the pattern given by the HTML5 spec for 'email' type form input elements.
     * * `noregex` Don't use a regex: super fast, really dumb.
     * @return boolean
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     * @static
     * @access public
     */
    public static function validateAddress($address, $patternselect = 'auto')
    {
<<<<<<< HEAD
        if ($patternselect == 'auto') {
            if (defined(
                'PCRE_VERSION'
            )
            ) { //Check this instead of extension_loaded so it works when that function is disabled
                if (version_compare(PCRE_VERSION, '8.0') >= 0) {
=======
        if (!$patternselect or $patternselect == 'auto') {
            //Check this constant first so it works when extension_loaded() is disabled by safe mode
            //Constant was added in PHP 5.2.4
            if (defined('PCRE_VERSION')) {
                //This pattern can get stuck in a recursive loop in PCRE <= 8.0.2
                if (version_compare(PCRE_VERSION, '8.0.3') >= 0) {
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                    $patternselect = 'pcre8';
                } else {
                    $patternselect = 'pcre';
                }
<<<<<<< HEAD
=======
            } elseif (function_exists('extension_loaded') and extension_loaded('pcre')) {
                //Fall back to older PCRE
                $patternselect = 'pcre';
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            } else {
                //Filter_var appeared in PHP 5.2.0 and does not require the PCRE extension
                if (version_compare(PHP_VERSION, '5.2.0') >= 0) {
                    $patternselect = 'php';
                } else {
                    $patternselect = 'noregex';
                }
            }
        }
        switch ($patternselect) {
            case 'pcre8':
                /**
<<<<<<< HEAD
                 * Conforms to RFC5322: Uses *correct* regex on which FILTER_VALIDATE_EMAIL is
                 * based; So why not use FILTER_VALIDATE_EMAIL? Because it was broken to
                 * not allow a@b type valid addresses :(
=======
                 * Uses the same RFC5322 regex on which FILTER_VALIDATE_EMAIL is based, but allows dotless domains.
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                 * @link http://squiloople.com/2009/12/20/email-address-validation/
                 * @copyright 2009-2010 Michael Rushton
                 * Feel free to use and redistribute this code. But please keep this copyright notice.
                 */
<<<<<<< HEAD
                return (bool)preg_match(
=======
                return (boolean)preg_match(
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                    '/^(?!(?>(?1)"?(?>\\\[ -~]|[^"])"?(?1)){255,})(?!(?>(?1)"?(?>\\\[ -~]|[^"])"?(?1)){65,}@)' .
                    '((?>(?>(?>((?>(?>(?>\x0D\x0A)?[\t ])+|(?>[\t ]*\x0D\x0A)?[\t ]+)?)(\((?>(?2)' .
                    '(?>[\x01-\x08\x0B\x0C\x0E-\'*-\[\]-\x7F]|\\\[\x00-\x7F]|(?3)))*(?2)\)))+(?2))|(?2))?)' .
                    '([!#-\'*+\/-9=?^-~-]+|"(?>(?2)(?>[\x01-\x08\x0B\x0C\x0E-!#-\[\]-\x7F]|\\\[\x00-\x7F]))*' .
                    '(?2)")(?>(?1)\.(?1)(?4))*(?1)@(?!(?1)[a-z0-9-]{64,})(?1)(?>([a-z0-9](?>[a-z0-9-]*[a-z0-9])?)' .
                    '(?>(?1)\.(?!(?1)[a-z0-9-]{64,})(?1)(?5)){0,126}|\[(?:(?>IPv6:(?>([a-f0-9]{1,4})(?>:(?6)){7}' .
                    '|(?!(?:.*[a-f0-9][:\]]){8,})((?6)(?>:(?6)){0,6})?::(?7)?))|(?>(?>IPv6:(?>(?6)(?>:(?6)){5}:' .
                    '|(?!(?:.*[a-f0-9]:){6,})(?8)?::(?>((?6)(?>:(?6)){0,4}):)?))?(25[0-5]|2[0-4][0-9]|1[0-9]{2}' .
                    '|[1-9]?[0-9])(?>\.(?9)){3}))\])(?1)$/isD',
                    $address
                );
<<<<<<< HEAD
                break;
            case 'pcre':
                //An older regex that doesn't need a recent PCRE
                return (bool)preg_match(
=======
            case 'pcre':
                //An older regex that doesn't need a recent PCRE
                return (boolean)preg_match(
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                    '/^(?!(?>"?(?>\\\[ -~]|[^"])"?){255,})(?!(?>"?(?>\\\[ -~]|[^"])"?){65,}@)(?>' .
                    '[!#-\'*+\/-9=?^-~-]+|"(?>(?>[\x01-\x08\x0B\x0C\x0E-!#-\[\]-\x7F]|\\\[\x00-\xFF]))*")' .
                    '(?>\.(?>[!#-\'*+\/-9=?^-~-]+|"(?>(?>[\x01-\x08\x0B\x0C\x0E-!#-\[\]-\x7F]|\\\[\x00-\xFF]))*"))*' .
                    '@(?>(?![a-z0-9-]{64,})(?>[a-z0-9](?>[a-z0-9-]*[a-z0-9])?)(?>\.(?![a-z0-9-]{64,})' .
                    '(?>[a-z0-9](?>[a-z0-9-]*[a-z0-9])?)){0,126}|\[(?:(?>IPv6:(?>(?>[a-f0-9]{1,4})(?>:' .
                    '[a-f0-9]{1,4}){7}|(?!(?:.*[a-f0-9][:\]]){8,})(?>[a-f0-9]{1,4}(?>:[a-f0-9]{1,4}){0,6})?' .
                    '::(?>[a-f0-9]{1,4}(?>:[a-f0-9]{1,4}){0,6})?))|(?>(?>IPv6:(?>[a-f0-9]{1,4}(?>:' .
                    '[a-f0-9]{1,4}){5}:|(?!(?:.*[a-f0-9]:){6,})(?>[a-f0-9]{1,4}(?>:[a-f0-9]{1,4}){0,4})?' .
                    '::(?>(?:[a-f0-9]{1,4}(?>:[a-f0-9]{1,4}){0,4}):)?))?(?>25[0-5]|2[0-4][0-9]|1[0-9]{2}' .
                    '|[1-9]?[0-9])(?>\.(?>25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9]?[0-9])){3}))\])$/isD',
                    $address
                );
<<<<<<< HEAD
                break;
            case 'php':
            default:
                return (bool)filter_var($address, FILTER_VALIDATE_EMAIL);
                break;
=======
            case 'html5':
                /**
                 * This is the pattern used in the HTML5 spec for validation of 'email' type form input elements.
                 * @link http://www.whatwg.org/specs/web-apps/current-work/#e-mail-state-(type=email)
                 */
                return (boolean)preg_match(
                    '/^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}' .
                    '[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/sD',
                    $address
                );
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            case 'noregex':
                //No PCRE! Do something _very_ approximate!
                //Check the address is 3 chars or longer and contains an @ that's not the first or last char
                return (strlen($address) >= 3
                    and strpos($address, '@') >= 1
                    and strpos($address, '@') != strlen($address) - 1);
<<<<<<< HEAD
                break;
=======
            case 'php':
            default:
                return (boolean)filter_var($address, FILTER_VALIDATE_EMAIL);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        }
    }

    /**
     * Create a message and send it.
     * Uses the sending method specified by $Mailer.
<<<<<<< HEAD
     * Returns false on error - Use the ErrorInfo variable to view description of the error.
     * @throws phpmailerException
     * @return bool
=======
     * @throws phpmailerException
     * @return boolean false on error - See the ErrorInfo property for details of the error.
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    public function send()
    {
        try {
            if (!$this->preSend()) {
                return false;
            }
            return $this->postSend();
<<<<<<< HEAD
        } catch (phpmailerException $e) {
            $this->mailHeader = '';
            $this->setError($e->getMessage());
            if ($this->exceptions) {
                throw $e;
=======
        } catch (phpmailerException $exc) {
            $this->mailHeader = '';
            $this->setError($exc->getMessage());
            if ($this->exceptions) {
                throw $exc;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            }
            return false;
        }
    }

    /**
     * Prepare a message for sending.
     * @throws phpmailerException
<<<<<<< HEAD
     * @return bool
=======
     * @return boolean
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    public function preSend()
    {
        try {
<<<<<<< HEAD
            $this->mailHeader = "";
=======
            $this->mailHeader = '';
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            if ((count($this->to) + count($this->cc) + count($this->bcc)) < 1) {
                throw new phpmailerException($this->lang('provide_address'), self::STOP_CRITICAL);
            }

            // Set whether the message is multipart/alternative
            if (!empty($this->AltBody)) {
                $this->ContentType = 'multipart/alternative';
            }

<<<<<<< HEAD
            $this->error_count = 0; // reset errors
=======
            $this->error_count = 0; // Reset errors
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            $this->setMessageType();
            // Refuse to send an empty message unless we are specifically allowing it
            if (!$this->AllowEmpty and empty($this->Body)) {
                throw new phpmailerException($this->lang('empty_message'), self::STOP_CRITICAL);
            }

<<<<<<< HEAD
            $this->MIMEHeader = $this->createHeader();
            $this->MIMEBody = $this->createBody();
=======
            // Create body before headers in case body makes changes to headers (e.g. altering transfer encoding)
            $this->MIMEHeader = '';
            $this->MIMEBody = $this->createBody();
            // createBody may have added some headers, so retain them
            $tempheaders = $this->MIMEHeader;
            $this->MIMEHeader = $this->createHeader();
            $this->MIMEHeader .= $tempheaders;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

            // To capture the complete message when using mail(), create
            // an extra header list which createHeader() doesn't fold in
            if ($this->Mailer == 'mail') {
                if (count($this->to) > 0) {
<<<<<<< HEAD
                    $this->mailHeader .= $this->addrAppend("To", $this->to);
                } else {
                    $this->mailHeader .= $this->headerLine("To", "undisclosed-recipients:;");
=======
                    $this->mailHeader .= $this->addrAppend('To', $this->to);
                } else {
                    $this->mailHeader .= $this->headerLine('To', 'undisclosed-recipients:;');
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                }
                $this->mailHeader .= $this->headerLine(
                    'Subject',
                    $this->encodeHeader($this->secureHeader(trim($this->Subject)))
                );
            }

            // Sign with DKIM if enabled
            if (!empty($this->DKIM_domain)
                && !empty($this->DKIM_private)
                && !empty($this->DKIM_selector)
<<<<<<< HEAD
                && !empty($this->DKIM_domain)
=======
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                && file_exists($this->DKIM_private)) {
                $header_dkim = $this->DKIM_Add(
                    $this->MIMEHeader . $this->mailHeader,
                    $this->encodeHeader($this->secureHeader($this->Subject)),
                    $this->MIMEBody
                );
                $this->MIMEHeader = rtrim($this->MIMEHeader, "\r\n ") . self::CRLF .
                    str_replace("\r\n", "\n", $header_dkim) . self::CRLF;
            }
            return true;
<<<<<<< HEAD

        } catch (phpmailerException $e) {
            $this->setError($e->getMessage());
            if ($this->exceptions) {
                throw $e;
=======
        } catch (phpmailerException $exc) {
            $this->setError($exc->getMessage());
            if ($this->exceptions) {
                throw $exc;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            }
            return false;
        }
    }

    /**
     * Actually send a message.
     * Send the email via the selected mechanism
     * @throws phpmailerException
<<<<<<< HEAD
     * @return bool
=======
     * @return boolean
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    public function postSend()
    {
        try {
            // Choose the mailer and send through it
            switch ($this->Mailer) {
                case 'sendmail':
<<<<<<< HEAD
=======
                case 'qmail':
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                    return $this->sendmailSend($this->MIMEHeader, $this->MIMEBody);
                case 'smtp':
                    return $this->smtpSend($this->MIMEHeader, $this->MIMEBody);
                case 'mail':
                    return $this->mailSend($this->MIMEHeader, $this->MIMEBody);
                default:
<<<<<<< HEAD
                    return $this->mailSend($this->MIMEHeader, $this->MIMEBody);
            }
        } catch (phpmailerException $e) {
            $this->setError($e->getMessage());
            if ($this->exceptions) {
                throw $e;
            }
            $this->edebug($e->getMessage() . "\n");
=======
                    $sendMethod = $this->Mailer.'Send';
                    if (method_exists($this, $sendMethod)) {
                        return $this->$sendMethod($this->MIMEHeader, $this->MIMEBody);
                    }

                    return $this->mailSend($this->MIMEHeader, $this->MIMEBody);
            }
        } catch (phpmailerException $exc) {
            $this->setError($exc->getMessage());
            $this->edebug($exc->getMessage());
            if ($this->exceptions) {
                throw $exc;
            }
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        }
        return false;
    }

    /**
     * Send mail using the $Sendmail program.
     * @param string $header The message headers
     * @param string $body The message body
     * @see PHPMailer::$Sendmail
     * @throws phpmailerException
     * @access protected
<<<<<<< HEAD
     * @return bool
=======
     * @return boolean
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    protected function sendmailSend($header, $body)
    {
        if ($this->Sender != '') {
<<<<<<< HEAD
            $sendmail = sprintf("%s -oi -f%s -t", escapeshellcmd($this->Sendmail), escapeshellarg($this->Sender));
        } else {
            $sendmail = sprintf("%s -oi -t", escapeshellcmd($this->Sendmail));
        }
        if ($this->SingleTo === true) {
            foreach ($this->SingleToArray as $val) {
                if (!@$mail = popen($sendmail, 'w')) {
                    throw new phpmailerException($this->lang('execute') . $this->Sendmail, self::STOP_CRITICAL);
                }
                fputs($mail, "To: " . $val . "\n");
                fputs($mail, $header);
                fputs($mail, $body);
                $result = pclose($mail);
                // implement call back function if it exists
                $isSent = ($result == 0) ? 1 : 0;
                $this->doCallback($isSent, $val, $this->cc, $this->bcc, $this->Subject, $body, $this->From);
=======
            if ($this->Mailer == 'qmail') {
                $sendmail = sprintf('%s -f%s', escapeshellcmd($this->Sendmail), escapeshellarg($this->Sender));
            } else {
                $sendmail = sprintf('%s -oi -f%s -t', escapeshellcmd($this->Sendmail), escapeshellarg($this->Sender));
            }
        } else {
            if ($this->Mailer == 'qmail') {
                $sendmail = sprintf('%s', escapeshellcmd($this->Sendmail));
            } else {
                $sendmail = sprintf('%s -oi -t', escapeshellcmd($this->Sendmail));
            }
        }
        if ($this->SingleTo) {
            foreach ($this->SingleToArray as $toAddr) {
                if (!@$mail = popen($sendmail, 'w')) {
                    throw new phpmailerException($this->lang('execute') . $this->Sendmail, self::STOP_CRITICAL);
                }
                fputs($mail, 'To: ' . $toAddr . "\n");
                fputs($mail, $header);
                fputs($mail, $body);
                $result = pclose($mail);
                $this->doCallback(
                    ($result == 0),
                    array($toAddr),
                    $this->cc,
                    $this->bcc,
                    $this->Subject,
                    $body,
                    $this->From
                );
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                if ($result != 0) {
                    throw new phpmailerException($this->lang('execute') . $this->Sendmail, self::STOP_CRITICAL);
                }
            }
        } else {
            if (!@$mail = popen($sendmail, 'w')) {
                throw new phpmailerException($this->lang('execute') . $this->Sendmail, self::STOP_CRITICAL);
            }
            fputs($mail, $header);
            fputs($mail, $body);
            $result = pclose($mail);
<<<<<<< HEAD
            // implement call back function if it exists
            $isSent = ($result == 0) ? 1 : 0;
            $this->doCallback($isSent, $this->to, $this->cc, $this->bcc, $this->Subject, $body, $this->From);
=======
            $this->doCallback(($result == 0), $this->to, $this->cc, $this->bcc, $this->Subject, $body, $this->From);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            if ($result != 0) {
                throw new phpmailerException($this->lang('execute') . $this->Sendmail, self::STOP_CRITICAL);
            }
        }
        return true;
    }

    /**
     * Send mail using the PHP mail() function.
     * @param string $header The message headers
     * @param string $body The message body
     * @link http://www.php.net/manual/en/book.mail.php
     * @throws phpmailerException
     * @access protected
<<<<<<< HEAD
     * @return bool
=======
     * @return boolean
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    protected function mailSend($header, $body)
    {
        $toArr = array();
<<<<<<< HEAD
        foreach ($this->to as $t) {
            $toArr[] = $this->addrFormat($t);
=======
        foreach ($this->to as $toaddr) {
            $toArr[] = $this->addrFormat($toaddr);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        }
        $to = implode(', ', $toArr);

        if (empty($this->Sender)) {
<<<<<<< HEAD
            $params = " ";
        } else {
            $params = sprintf("-f%s", $this->Sender);
=======
            $params = ' ';
        } else {
            $params = sprintf('-f%s', $this->Sender);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        }
        if ($this->Sender != '' and !ini_get('safe_mode')) {
            $old_from = ini_get('sendmail_from');
            ini_set('sendmail_from', $this->Sender);
        }
<<<<<<< HEAD
        $rt = false;
        if ($this->SingleTo === true && count($toArr) > 1) {
            foreach ($toArr as $val) {
                $rt = $this->mailPassthru($val, $this->Subject, $body, $header, $params);
                // implement call back function if it exists
                $isSent = ($rt == 1) ? 1 : 0;
                $this->doCallback($isSent, $val, $this->cc, $this->bcc, $this->Subject, $body, $this->From);
            }
        } else {
            $rt = $this->mailPassthru($to, $this->Subject, $body, $header, $params);
            // implement call back function if it exists
            $isSent = ($rt == 1) ? 1 : 0;
            $this->doCallback($isSent, $to, $this->cc, $this->bcc, $this->Subject, $body, $this->From);
=======
        $result = false;
        if ($this->SingleTo && count($toArr) > 1) {
            foreach ($toArr as $toAddr) {
                $result = $this->mailPassthru($toAddr, $this->Subject, $body, $header, $params);
                $this->doCallback($result, array($toAddr), $this->cc, $this->bcc, $this->Subject, $body, $this->From);
            }
        } else {
            $result = $this->mailPassthru($to, $this->Subject, $body, $header, $params);
            $this->doCallback($result, $this->to, $this->cc, $this->bcc, $this->Subject, $body, $this->From);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        }
        if (isset($old_from)) {
            ini_set('sendmail_from', $old_from);
        }
<<<<<<< HEAD
        if (!$rt) {
=======
        if (!$result) {
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            throw new phpmailerException($this->lang('instantiate'), self::STOP_CRITICAL);
        }
        return true;
    }

    /**
     * Get an instance to use for SMTP operations.
     * Override this function to load your own SMTP implementation
     * @return SMTP
     */
    public function getSMTPInstance()
    {
        if (!is_object($this->smtp)) {
<<<<<<< HEAD
            require_once 'class-smtp.php';
=======
        	require_once( 'class-smtp.php' );
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            $this->smtp = new SMTP;
        }
        return $this->smtp;
    }

    /**
     * Send mail via SMTP.
     * Returns false if there is a bad MAIL FROM, RCPT, or DATA input.
     * Uses the PHPMailerSMTP class by default.
     * @see PHPMailer::getSMTPInstance() to use a different class.
     * @param string $header The message headers
     * @param string $body The message body
     * @throws phpmailerException
     * @uses SMTP
     * @access protected
<<<<<<< HEAD
     * @return bool
=======
     * @return boolean
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    protected function smtpSend($header, $body)
    {
        $bad_rcpt = array();
<<<<<<< HEAD

        if (!$this->smtpConnect()) {
            throw new phpmailerException($this->lang('smtp_connect_failed'), self::STOP_CRITICAL);
        }
        $smtp_from = ($this->Sender == '') ? $this->From : $this->Sender;
=======
        if (!$this->smtpConnect($this->SMTPOptions)) {
            throw new phpmailerException($this->lang('smtp_connect_failed'), self::STOP_CRITICAL);
        }
        if ('' == $this->Sender) {
            $smtp_from = $this->From;
        } else {
            $smtp_from = $this->Sender;
        }
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        if (!$this->smtp->mail($smtp_from)) {
            $this->setError($this->lang('from_failed') . $smtp_from . ' : ' . implode(',', $this->smtp->getError()));
            throw new phpmailerException($this->ErrorInfo, self::STOP_CRITICAL);
        }

<<<<<<< HEAD
        // Attempt to send attach all recipients
        foreach ($this->to as $to) {
            if (!$this->smtp->recipient($to[0])) {
                $bad_rcpt[] = $to[0];
                $isSent = 0;
            } else {
                $isSent = 1;
            }
            $this->doCallback($isSent, $to[0], '', '', $this->Subject, $body, $this->From);
        }
        foreach ($this->cc as $cc) {
            if (!$this->smtp->recipient($cc[0])) {
                $bad_rcpt[] = $cc[0];
                $isSent = 0;
            } else {
                $isSent = 1;
            }
            $this->doCallback($isSent, '', $cc[0], '', $this->Subject, $body, $this->From);
        }
        foreach ($this->bcc as $bcc) {
            if (!$this->smtp->recipient($bcc[0])) {
                $bad_rcpt[] = $bcc[0];
                $isSent = 0;
            } else {
                $isSent = 1;
            }
            $this->doCallback($isSent, '', '', $bcc[0], $this->Subject, $body, $this->From);
        }

        if (count($bad_rcpt) > 0) { //Create error message for any bad addresses
            throw new phpmailerException($this->lang('recipients_failed') . implode(', ', $bad_rcpt));
        }
        if (!$this->smtp->data($header . $body)) {
            throw new phpmailerException($this->lang('data_not_accepted'), self::STOP_CRITICAL);
        }
        if ($this->SMTPKeepAlive == true) {
=======
        // Attempt to send to all recipients
        foreach (array($this->to, $this->cc, $this->bcc) as $togroup) {
            foreach ($togroup as $to) {
                if (!$this->smtp->recipient($to[0])) {
                    $error = $this->smtp->getError();
                    $bad_rcpt[] = array('to' => $to[0], 'error' => $error['detail']);
                    $isSent = false;
                } else {
                    $isSent = true;
                }
                $this->doCallback($isSent, array($to[0]), array(), array(), $this->Subject, $body, $this->From);
            }
        }

        // Only send the DATA command if we have viable recipients
        if ((count($this->all_recipients) > count($bad_rcpt)) and !$this->smtp->data($header . $body)) {
            throw new phpmailerException($this->lang('data_not_accepted'), self::STOP_CRITICAL);
        }
        if ($this->SMTPKeepAlive) {
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            $this->smtp->reset();
        } else {
            $this->smtp->quit();
            $this->smtp->close();
        }
<<<<<<< HEAD
=======
        //Create error message for any bad addresses
        if (count($bad_rcpt) > 0) {
            $errstr = '';
            foreach ($bad_rcpt as $bad) {
                $errstr .= $bad['to'] . ': ' . $bad['error'];
            }
            throw new phpmailerException(
                $this->lang('recipients_failed') . $errstr,
                self::STOP_CONTINUE
            );
        }
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        return true;
    }

    /**
     * Initiate a connection to an SMTP server.
     * Returns false if the operation failed.
     * @param array $options An array of options compatible with stream_context_create()
     * @uses SMTP
     * @access public
     * @throws phpmailerException
<<<<<<< HEAD
     * @return bool
=======
     * @return boolean
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    public function smtpConnect($options = array())
    {
        if (is_null($this->smtp)) {
            $this->smtp = $this->getSMTPInstance();
        }

<<<<<<< HEAD
        //Already connected?
=======
        // Already connected?
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        if ($this->smtp->connected()) {
            return true;
        }

        $this->smtp->setTimeout($this->Timeout);
        $this->smtp->setDebugLevel($this->SMTPDebug);
        $this->smtp->setDebugOutput($this->Debugoutput);
        $this->smtp->setVerp($this->do_verp);
<<<<<<< HEAD
        $tls = ($this->SMTPSecure == 'tls');
        $ssl = ($this->SMTPSecure == 'ssl');
=======
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        $hosts = explode(';', $this->Host);
        $lastexception = null;

        foreach ($hosts as $hostentry) {
            $hostinfo = array();
<<<<<<< HEAD
            $host = $hostentry;
            $port = $this->Port;
            if (preg_match(
                '/^(.+):([0-9]+)$/',
                $hostentry,
                $hostinfo
            )
            ) { //If $hostentry contains 'address:port', override default
                $host = $hostinfo[1];
                $port = $hostinfo[2];
            }
            if ($this->smtp->connect(($ssl ? 'ssl://' : '') . $host, $port, $this->Timeout, $options)) {
=======
            if (!preg_match('/^((ssl|tls):\/\/)*([a-zA-Z0-9\.-]*):?([0-9]*)$/', trim($hostentry), $hostinfo)) {
                // Not a valid host entry
                continue;
            }
            // $hostinfo[2]: optional ssl or tls prefix
            // $hostinfo[3]: the hostname
            // $hostinfo[4]: optional port number
            // The host string prefix can temporarily override the current setting for SMTPSecure
            // If it's not specified, the default value is used
            $prefix = '';
            $secure = $this->SMTPSecure;
            $tls = ($this->SMTPSecure == 'tls');
            if ('ssl' == $hostinfo[2] or ('' == $hostinfo[2] and 'ssl' == $this->SMTPSecure)) {
                $prefix = 'ssl://';
                $tls = false; // Can't have SSL and TLS at the same time
                $secure = 'ssl';
            } elseif ($hostinfo[2] == 'tls') {
                $tls = true;
                // tls doesn't use a prefix
                $secure = 'tls';
            }
            //Do we need the OpenSSL extension?
            $sslext = defined('OPENSSL_ALGO_SHA1');
            if ('tls' === $secure or 'ssl' === $secure) {
                //Check for an OpenSSL constant rather than using extension_loaded, which is sometimes disabled
                if (!$sslext) {
                    throw new phpmailerException($this->lang('extension_missing').'openssl', self::STOP_CRITICAL);
                }
            }
            $host = $hostinfo[3];
            $port = $this->Port;
            $tport = (integer)$hostinfo[4];
            if ($tport > 0 and $tport < 65536) {
                $port = $tport;
            }
            if ($this->smtp->connect($prefix . $host, $port, $this->Timeout, $options)) {
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                try {
                    if ($this->Helo) {
                        $hello = $this->Helo;
                    } else {
                        $hello = $this->serverHostname();
                    }
                    $this->smtp->hello($hello);
<<<<<<< HEAD

=======
                    //Automatically enable TLS encryption if:
                    // * it's not disabled
                    // * we have openssl extension
                    // * we are not already using SSL
                    // * the server offers STARTTLS
                    if ($this->SMTPAutoTLS and $sslext and $secure != 'ssl' and $this->smtp->getServerExt('STARTTLS')) {
                        $tls = true;
                    }
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                    if ($tls) {
                        if (!$this->smtp->startTLS()) {
                            throw new phpmailerException($this->lang('connect_host'));
                        }
<<<<<<< HEAD
                        //We must resend HELO after tls negotiation
=======
                        // We must resend HELO after tls negotiation
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                        $this->smtp->hello($hello);
                    }
                    if ($this->SMTPAuth) {
                        if (!$this->smtp->authenticate(
                            $this->Username,
                            $this->Password,
                            $this->AuthType,
                            $this->Realm,
                            $this->Workstation
                        )
                        ) {
                            throw new phpmailerException($this->lang('authenticate'));
                        }
                    }
                    return true;
<<<<<<< HEAD
                } catch (phpmailerException $e) {
                    $lastexception = $e;
                    //We must have connected, but then failed TLS or Auth, so close connection nicely
=======
                } catch (phpmailerException $exc) {
                    $lastexception = $exc;
                    $this->edebug($exc->getMessage());
                    // We must have connected, but then failed TLS or Auth, so close connection nicely
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                    $this->smtp->quit();
                }
            }
        }
<<<<<<< HEAD
        //If we get here, all connection attempts have failed, so close connection hard
        $this->smtp->close();
        //As we've caught all exceptions, just report whatever the last one was
=======
        // If we get here, all connection attempts have failed, so close connection hard
        $this->smtp->close();
        // As we've caught all exceptions, just report whatever the last one was
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        if ($this->exceptions and !is_null($lastexception)) {
            throw $lastexception;
        }
        return false;
    }

    /**
     * Close the active SMTP session if one exists.
     * @return void
     */
    public function smtpClose()
    {
        if ($this->smtp !== null) {
            if ($this->smtp->connected()) {
                $this->smtp->quit();
                $this->smtp->close();
            }
        }
    }

    /**
     * Set the language for error messages.
     * Returns false if it cannot load the language file.
     * The default language is English.
     * @param string $langcode ISO 639-1 2-character language code (e.g. French is "fr")
     * @param string $lang_path Path to the language file directory, with trailing separator (slash)
<<<<<<< HEAD
     * @return bool
     * @access public
     */
    public function setLanguage($langcode = 'en', $lang_path = 'language/')
    {
        //Define full set of translatable strings
=======
     * @return boolean
     * @access public
     */
    public function setLanguage($langcode = 'en', $lang_path = '')
    {
        // Define full set of translatable strings in English
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        $PHPMAILER_LANG = array(
            'authenticate' => 'SMTP Error: Could not authenticate.',
            'connect_host' => 'SMTP Error: Could not connect to SMTP host.',
            'data_not_accepted' => 'SMTP Error: data not accepted.',
            'empty_message' => 'Message body empty',
            'encoding' => 'Unknown encoding: ',
            'execute' => 'Could not execute: ',
            'file_access' => 'Could not access file: ',
            'file_open' => 'File Error: Could not open file: ',
            'from_failed' => 'The following From address failed: ',
            'instantiate' => 'Could not instantiate mail function.',
            'invalid_address' => 'Invalid address',
            'mailer_not_supported' => ' mailer is not supported.',
            'provide_address' => 'You must provide at least one recipient email address.',
            'recipients_failed' => 'SMTP Error: The following recipients failed: ',
            'signing' => 'Signing Error: ',
            'smtp_connect_failed' => 'SMTP connect() failed.',
            'smtp_error' => 'SMTP server error: ',
<<<<<<< HEAD
            'variable_set' => 'Cannot set or reset variable: '
        );
        //Overwrite language-specific strings.
        //This way we'll never have missing translations - no more "language string failed to load"!
        $l = true;
        if ($langcode != 'en') { //There is no English translation file
            $l = @include $lang_path . 'phpmailer.lang-' . $langcode . '.php';
        }
        $this->language = $PHPMAILER_LANG;
        return ($l == true); //Returns false if language not found
=======
            'variable_set' => 'Cannot set or reset variable: ',
            'extension_missing' => 'Extension missing: '
        );
        if (empty($lang_path)) {
            // Calculate an absolute path so it can work if CWD is not here
            $lang_path = dirname(__FILE__). DIRECTORY_SEPARATOR . 'language'. DIRECTORY_SEPARATOR;
        }
        $foundlang = true;
        $lang_file = $lang_path . 'phpmailer.lang-' . $langcode . '.php';
        // There is no English translation file
        if ($langcode != 'en') {
            // Make sure language file path is readable
            if (!is_readable($lang_file)) {
                $foundlang = false;
            } else {
                // Overwrite language-specific strings.
                // This way we'll never have missing translation keys.
                $foundlang = include $lang_file;
            }
        }
        $this->language = $PHPMAILER_LANG;
        return (boolean)$foundlang; // Returns false if language not found
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
    }

    /**
     * Get the array of strings for the current language.
     * @return array
     */
    public function getTranslations()
    {
        return $this->language;
    }

    /**
     * Create recipient headers.
     * @access public
     * @param string $type
     * @param array $addr An array of recipient,
     * where each recipient is a 2-element indexed array with element 0 containing an address
     * and element 1 containing a name, like:
     * array(array('joe@example.com', 'Joe User'), array('zoe@example.com', 'Zoe User'))
     * @return string
     */
    public function addrAppend($type, $addr)
    {
        $addresses = array();
<<<<<<< HEAD
        foreach ($addr as $a) {
            $addresses[] = $this->addrFormat($a);
=======
        foreach ($addr as $address) {
            $addresses[] = $this->addrFormat($address);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        }
        return $type . ': ' . implode(', ', $addresses) . $this->LE;
    }

    /**
     * Format an address for use in a message header.
     * @access public
     * @param array $addr A 2-element indexed array, element 0 containing an address, element 1 containing a name
     *      like array('joe@example.com', 'Joe User')
     * @return string
     */
    public function addrFormat($addr)
    {
        if (empty($addr[1])) { // No name provided
            return $this->secureHeader($addr[0]);
        } else {
<<<<<<< HEAD
            return $this->encodeHeader($this->secureHeader($addr[1]), 'phrase') . " <" . $this->secureHeader(
                $addr[0]
            ) . ">";
=======
            return $this->encodeHeader($this->secureHeader($addr[1]), 'phrase') . ' <' . $this->secureHeader(
                $addr[0]
            ) . '>';
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        }
    }

    /**
     * Word-wrap message.
     * For use with mailers that do not automatically perform wrapping
     * and for quoted-printable encoded messages.
     * Original written by philippe.
     * @param string $message The message to wrap
     * @param integer $length The line length to wrap to
<<<<<<< HEAD
     * @param bool $qp_mode Whether to run in Quoted-Printable mode
=======
     * @param boolean $qp_mode Whether to run in Quoted-Printable mode
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     * @access public
     * @return string
     */
    public function wrapText($message, $length, $qp_mode = false)
    {
<<<<<<< HEAD
        $soft_break = ($qp_mode) ? sprintf(" =%s", $this->LE) : $this->LE;
        // If utf-8 encoding is used, we will need to make sure we don't
        // split multibyte characters when we wrap
        $is_utf8 = (strtolower($this->CharSet) == "utf-8");
=======
        if ($qp_mode) {
            $soft_break = sprintf(' =%s', $this->LE);
        } else {
            $soft_break = $this->LE;
        }
        // If utf-8 encoding is used, we will need to make sure we don't
        // split multibyte characters when we wrap
        $is_utf8 = (strtolower($this->CharSet) == 'utf-8');
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        $lelen = strlen($this->LE);
        $crlflen = strlen(self::CRLF);

        $message = $this->fixEOL($message);
<<<<<<< HEAD
=======
        //Remove a trailing line break
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        if (substr($message, -$lelen) == $this->LE) {
            $message = substr($message, 0, -$lelen);
        }

<<<<<<< HEAD
        $line = explode($this->LE, $message); // Magic. We know fixEOL uses $LE
        $message = '';
        for ($i = 0; $i < count($line); $i++) {
            $line_part = explode(' ', $line[$i]);
            $buf = '';
            for ($e = 0; $e < count($line_part); $e++) {
                $word = $line_part[$e];
                if ($qp_mode and (strlen($word) > $length)) {
                    $space_left = $length - strlen($buf) - $crlflen;
                    if ($e != 0) {
=======
        //Split message into lines
        $lines = explode($this->LE, $message);
        //Message will be rebuilt in here
        $message = '';
        foreach ($lines as $line) {
            $words = explode(' ', $line);
            $buf = '';
            $firstword = true;
            foreach ($words as $word) {
                if ($qp_mode and (strlen($word) > $length)) {
                    $space_left = $length - strlen($buf) - $crlflen;
                    if (!$firstword) {
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                        if ($space_left > 20) {
                            $len = $space_left;
                            if ($is_utf8) {
                                $len = $this->utf8CharBoundary($word, $len);
<<<<<<< HEAD
                            } elseif (substr($word, $len - 1, 1) == "=") {
                                $len--;
                            } elseif (substr($word, $len - 2, 1) == "=") {
=======
                            } elseif (substr($word, $len - 1, 1) == '=') {
                                $len--;
                            } elseif (substr($word, $len - 2, 1) == '=') {
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                                $len -= 2;
                            }
                            $part = substr($word, 0, $len);
                            $word = substr($word, $len);
                            $buf .= ' ' . $part;
<<<<<<< HEAD
                            $message .= $buf . sprintf("=%s", self::CRLF);
=======
                            $message .= $buf . sprintf('=%s', self::CRLF);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                        } else {
                            $message .= $buf . $soft_break;
                        }
                        $buf = '';
                    }
                    while (strlen($word) > 0) {
                        if ($length <= 0) {
                            break;
                        }
                        $len = $length;
                        if ($is_utf8) {
                            $len = $this->utf8CharBoundary($word, $len);
<<<<<<< HEAD
                        } elseif (substr($word, $len - 1, 1) == "=") {
                            $len--;
                        } elseif (substr($word, $len - 2, 1) == "=") {
=======
                        } elseif (substr($word, $len - 1, 1) == '=') {
                            $len--;
                        } elseif (substr($word, $len - 2, 1) == '=') {
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                            $len -= 2;
                        }
                        $part = substr($word, 0, $len);
                        $word = substr($word, $len);

                        if (strlen($word) > 0) {
<<<<<<< HEAD
                            $message .= $part . sprintf("=%s", self::CRLF);
=======
                            $message .= $part . sprintf('=%s', self::CRLF);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                        } else {
                            $buf = $part;
                        }
                    }
                } else {
                    $buf_o = $buf;
<<<<<<< HEAD
                    $buf .= ($e == 0) ? $word : (' ' . $word);
=======
                    if (!$firstword) {
                        $buf .= ' ';
                    }
                    $buf .= $word;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

                    if (strlen($buf) > $length and $buf_o != '') {
                        $message .= $buf_o . $soft_break;
                        $buf = $word;
                    }
                }
<<<<<<< HEAD
=======
                $firstword = false;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            }
            $message .= $buf . self::CRLF;
        }

        return $message;
    }

    /**
     * Find the last character boundary prior to $maxLength in a utf-8
<<<<<<< HEAD
     * quoted (printable) encoded string.
     * Original written by Colin Brown.
     * @access public
     * @param string $encodedText utf-8 QP text
     * @param int $maxLength   find last character boundary prior to this length
     * @return int
=======
     * quoted-printable encoded string.
     * Original written by Colin Brown.
     * @access public
     * @param string $encodedText utf-8 QP text
     * @param integer $maxLength Find the last character boundary prior to this length
     * @return integer
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    public function utf8CharBoundary($encodedText, $maxLength)
    {
        $foundSplitPos = false;
        $lookBack = 3;
        while (!$foundSplitPos) {
            $lastChunk = substr($encodedText, $maxLength - $lookBack, $lookBack);
<<<<<<< HEAD
            $encodedCharPos = strpos($lastChunk, "=");
            if ($encodedCharPos !== false) {
=======
            $encodedCharPos = strpos($lastChunk, '=');
            if (false !== $encodedCharPos) {
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                // Found start of encoded character byte within $lookBack block.
                // Check the encoded byte value (the 2 chars after the '=')
                $hex = substr($encodedText, $maxLength - $lookBack + $encodedCharPos + 1, 2);
                $dec = hexdec($hex);
<<<<<<< HEAD
                if ($dec < 128) { // Single byte character.
                    // If the encoded char was found at pos 0, it will fit
                    // otherwise reduce maxLength to start of the encoded char
                    $maxLength = ($encodedCharPos == 0) ? $maxLength :
                        $maxLength - ($lookBack - $encodedCharPos);
                    $foundSplitPos = true;
                } elseif ($dec >= 192) { // First byte of a multi byte character
                    // Reduce maxLength to split at start of character
                    $maxLength = $maxLength - ($lookBack - $encodedCharPos);
                    $foundSplitPos = true;
                } elseif ($dec < 192) { // Middle byte of a multi byte character, look further back
=======
                if ($dec < 128) {
                    // Single byte character.
                    // If the encoded char was found at pos 0, it will fit
                    // otherwise reduce maxLength to start of the encoded char
                    if ($encodedCharPos > 0) {
                        $maxLength = $maxLength - ($lookBack - $encodedCharPos);
                    }
                    $foundSplitPos = true;
                } elseif ($dec >= 192) {
                    // First byte of a multi byte character
                    // Reduce maxLength to split at start of character
                    $maxLength = $maxLength - ($lookBack - $encodedCharPos);
                    $foundSplitPos = true;
                } elseif ($dec < 192) {
                    // Middle byte of a multi byte character, look further back
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                    $lookBack += 3;
                }
            } else {
                // No encoded character found
                $foundSplitPos = true;
            }
        }
        return $maxLength;
    }

<<<<<<< HEAD

    /**
     * Set the body wrapping.
=======
    /**
     * Apply word wrapping to the message body.
     * Wraps the message body to the number of chars set in the WordWrap property.
     * You should only do this to plain-text bodies as wrapping HTML tags may break them.
     * This is called automatically by createBody(), so you don't need to call it yourself.
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     * @access public
     * @return void
     */
    public function setWordWrap()
    {
        if ($this->WordWrap < 1) {
            return;
        }

        switch ($this->message_type) {
            case 'alt':
            case 'alt_inline':
            case 'alt_attach':
            case 'alt_inline_attach':
                $this->AltBody = $this->wrapText($this->AltBody, $this->WordWrap);
                break;
            default:
                $this->Body = $this->wrapText($this->Body, $this->WordWrap);
                break;
        }
    }

    /**
     * Assemble message headers.
     * @access public
     * @return string The assembled headers
     */
    public function createHeader()
    {
        $result = '';

<<<<<<< HEAD
        // Set the boundaries
        $uniq_id = md5(uniqid(time()));
        $this->boundary[1] = 'b1_' . $uniq_id;
        $this->boundary[2] = 'b2_' . $uniq_id;
        $this->boundary[3] = 'b3_' . $uniq_id;

        if ($this->MessageDate == '') {
            $result .= $this->headerLine('Date', self::rfcDate());
        } else {
            $result .= $this->headerLine('Date', $this->MessageDate);
        }

        if ($this->ReturnPath) {
            $result .= $this->headerLine('Return-Path', '<' . trim($this->ReturnPath) . '>');
        } elseif ($this->Sender == '') {
            $result .= $this->headerLine('Return-Path', '<' . trim($this->From) . '>');
        } else {
            $result .= $this->headerLine('Return-Path', '<' . trim($this->Sender) . '>');
        }

        // To be created automatically by mail()
        if ($this->Mailer != 'mail') {
            if ($this->SingleTo === true) {
                foreach ($this->to as $t) {
                    $this->SingleToArray[] = $this->addrFormat($t);
                }
            } else {
                if (count($this->to) > 0) {
                    $result .= $this->addrAppend('To', $this->to);
                } elseif (count($this->cc) == 0) {
                    $result .= $this->headerLine('To', 'undisclosed-recipients:;');
                }
=======
        if ($this->MessageDate == '') {
            $this->MessageDate = self::rfcDate();
        }
        $result .= $this->headerLine('Date', $this->MessageDate);


        // To be created automatically by mail()
        if ($this->SingleTo) {
            if ($this->Mailer != 'mail') {
                foreach ($this->to as $toaddr) {
                    $this->SingleToArray[] = $this->addrFormat($toaddr);
                }
            }
        } else {
            if (count($this->to) > 0) {
                if ($this->Mailer != 'mail') {
                    $result .= $this->addrAppend('To', $this->to);
                }
            } elseif (count($this->cc) == 0) {
                $result .= $this->headerLine('To', 'undisclosed-recipients:;');
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            }
        }

        $result .= $this->addrAppend('From', array(array(trim($this->From), $this->FromName)));

        // sendmail and mail() extract Cc from the header before sending
        if (count($this->cc) > 0) {
            $result .= $this->addrAppend('Cc', $this->cc);
        }

        // sendmail and mail() extract Bcc from the header before sending
<<<<<<< HEAD
        if ((($this->Mailer == 'sendmail') || ($this->Mailer == 'mail')) && (count($this->bcc) > 0)) {
=======
        if ((
                $this->Mailer == 'sendmail' or $this->Mailer == 'qmail' or $this->Mailer == 'mail'
            )
            and count($this->bcc) > 0
        ) {
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            $result .= $this->addrAppend('Bcc', $this->bcc);
        }

        if (count($this->ReplyTo) > 0) {
            $result .= $this->addrAppend('Reply-To', $this->ReplyTo);
        }

        // mail() sets the subject itself
        if ($this->Mailer != 'mail') {
            $result .= $this->headerLine('Subject', $this->encodeHeader($this->secureHeader($this->Subject)));
        }

        if ($this->MessageID != '') {
            $this->lastMessageID = $this->MessageID;
        } else {
<<<<<<< HEAD
            $this->lastMessageID = sprintf("<%s@%s>", $uniq_id, $this->ServerHostname());
        }
        $result .= $this->HeaderLine('Message-ID', $this->lastMessageID);
=======
            $this->lastMessageID = sprintf('<%s@%s>', $this->uniqueid, $this->ServerHostname());
        }
        $result .= $this->headerLine('Message-ID', $this->lastMessageID);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        $result .= $this->headerLine('X-Priority', $this->Priority);
        if ($this->XMailer == '') {
            $result .= $this->headerLine(
                'X-Mailer',
                'PHPMailer ' . $this->Version . ' (https://github.com/PHPMailer/PHPMailer/)'
            );
        } else {
            $myXmailer = trim($this->XMailer);
            if ($myXmailer) {
                $result .= $this->headerLine('X-Mailer', $myXmailer);
            }
        }

        if ($this->ConfirmReadingTo != '') {
            $result .= $this->headerLine('Disposition-Notification-To', '<' . trim($this->ConfirmReadingTo) . '>');
        }

        // Add custom headers
<<<<<<< HEAD
        for ($index = 0; $index < count($this->CustomHeader); $index++) {
            $result .= $this->headerLine(
                trim($this->CustomHeader[$index][0]),
                $this->encodeHeader(trim($this->CustomHeader[$index][1]))
=======
        foreach ($this->CustomHeader as $header) {
            $result .= $this->headerLine(
                trim($header[0]),
                $this->encodeHeader(trim($header[1]))
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            );
        }
        if (!$this->sign_key_file) {
            $result .= $this->headerLine('MIME-Version', '1.0');
            $result .= $this->getMailMIME();
        }

        return $result;
    }

    /**
     * Get the message MIME type headers.
     * @access public
     * @return string
     */
    public function getMailMIME()
    {
        $result = '';
<<<<<<< HEAD
=======
        $ismultipart = true;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        switch ($this->message_type) {
            case 'inline':
                $result .= $this->headerLine('Content-Type', 'multipart/related;');
                $result .= $this->textLine("\tboundary=\"" . $this->boundary[1] . '"');
                break;
            case 'attach':
            case 'inline_attach':
            case 'alt_attach':
            case 'alt_inline_attach':
                $result .= $this->headerLine('Content-Type', 'multipart/mixed;');
                $result .= $this->textLine("\tboundary=\"" . $this->boundary[1] . '"');
                break;
            case 'alt':
            case 'alt_inline':
                $result .= $this->headerLine('Content-Type', 'multipart/alternative;');
                $result .= $this->textLine("\tboundary=\"" . $this->boundary[1] . '"');
                break;
            default:
                // Catches case 'plain': and case '':
                $result .= $this->textLine('Content-Type: ' . $this->ContentType . '; charset=' . $this->CharSet);
<<<<<<< HEAD
                break;
        }
        //RFC1341 part 5 says 7bit is assumed if not specified
        if ($this->Encoding != '7bit') {
            $result .= $this->headerLine('Content-Transfer-Encoding', $this->Encoding);
=======
                $ismultipart = false;
                break;
        }
        // RFC1341 part 5 says 7bit is assumed if not specified
        if ($this->Encoding != '7bit') {
            // RFC 2045 section 6.4 says multipart MIME parts may only use 7bit, 8bit or binary CTE
            if ($ismultipart) {
                if ($this->Encoding == '8bit') {
                    $result .= $this->headerLine('Content-Transfer-Encoding', '8bit');
                }
                // The only remaining alternatives are quoted-printable and base64, which are both 7bit compatible
            } else {
                $result .= $this->headerLine('Content-Transfer-Encoding', $this->Encoding);
            }
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        }

        if ($this->Mailer != 'mail') {
            $result .= $this->LE;
        }

        return $result;
    }

    /**
     * Returns the whole MIME message.
     * Includes complete headers and body.
<<<<<<< HEAD
     * Only valid post PreSend().
     * @see PHPMailer::PreSend()
=======
     * Only valid post preSend().
     * @see PHPMailer::preSend()
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     * @access public
     * @return string
     */
    public function getSentMIMEMessage()
    {
        return $this->MIMEHeader . $this->mailHeader . self::CRLF . $this->MIMEBody;
    }

<<<<<<< HEAD

=======
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
    /**
     * Assemble the message body.
     * Returns an empty string on failure.
     * @access public
     * @throws phpmailerException
     * @return string The assembled message body
     */
    public function createBody()
    {
        $body = '';
<<<<<<< HEAD
=======
        //Create unique IDs and preset boundaries
        $this->uniqueid = md5(uniqid(time()));
        $this->boundary[1] = 'b1_' . $this->uniqueid;
        $this->boundary[2] = 'b2_' . $this->uniqueid;
        $this->boundary[3] = 'b3_' . $this->uniqueid;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

        if ($this->sign_key_file) {
            $body .= $this->getMailMIME() . $this->LE;
        }

        $this->setWordWrap();

<<<<<<< HEAD
        switch ($this->message_type) {
            case 'inline':
                $body .= $this->getBoundary($this->boundary[1], '', '', '');
                $body .= $this->encodeString($this->Body, $this->Encoding);
=======
        $bodyEncoding = $this->Encoding;
        $bodyCharSet = $this->CharSet;
        //Can we do a 7-bit downgrade?
        if ($bodyEncoding == '8bit' and !$this->has8bitChars($this->Body)) {
            $bodyEncoding = '7bit';
            $bodyCharSet = 'us-ascii';
        }
        //If lines are too long, change to quoted-printable transfer encoding
        if (self::hasLineLongerThanMax($this->Body)) {
            $this->Encoding = 'quoted-printable';
            $bodyEncoding = 'quoted-printable';
        }

        $altBodyEncoding = $this->Encoding;
        $altBodyCharSet = $this->CharSet;
        //Can we do a 7-bit downgrade?
        if ($altBodyEncoding == '8bit' and !$this->has8bitChars($this->AltBody)) {
            $altBodyEncoding = '7bit';
            $altBodyCharSet = 'us-ascii';
        }
        //If lines are too long, change to quoted-printable transfer encoding
        if (self::hasLineLongerThanMax($this->AltBody)) {
            $altBodyEncoding = 'quoted-printable';
        }
        //Use this as a preamble in all multipart message types
        $mimepre = "This is a multi-part message in MIME format." . $this->LE . $this->LE;
        switch ($this->message_type) {
            case 'inline':
                $body .= $mimepre;
                $body .= $this->getBoundary($this->boundary[1], $bodyCharSet, '', $bodyEncoding);
                $body .= $this->encodeString($this->Body, $bodyEncoding);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                $body .= $this->LE . $this->LE;
                $body .= $this->attachAll('inline', $this->boundary[1]);
                break;
            case 'attach':
<<<<<<< HEAD
                $body .= $this->getBoundary($this->boundary[1], '', '', '');
                $body .= $this->encodeString($this->Body, $this->Encoding);
=======
                $body .= $mimepre;
                $body .= $this->getBoundary($this->boundary[1], $bodyCharSet, '', $bodyEncoding);
                $body .= $this->encodeString($this->Body, $bodyEncoding);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                $body .= $this->LE . $this->LE;
                $body .= $this->attachAll('attachment', $this->boundary[1]);
                break;
            case 'inline_attach':
<<<<<<< HEAD
=======
                $body .= $mimepre;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                $body .= $this->textLine('--' . $this->boundary[1]);
                $body .= $this->headerLine('Content-Type', 'multipart/related;');
                $body .= $this->textLine("\tboundary=\"" . $this->boundary[2] . '"');
                $body .= $this->LE;
<<<<<<< HEAD
                $body .= $this->getBoundary($this->boundary[2], '', '', '');
                $body .= $this->encodeString($this->Body, $this->Encoding);
=======
                $body .= $this->getBoundary($this->boundary[2], $bodyCharSet, '', $bodyEncoding);
                $body .= $this->encodeString($this->Body, $bodyEncoding);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                $body .= $this->LE . $this->LE;
                $body .= $this->attachAll('inline', $this->boundary[2]);
                $body .= $this->LE;
                $body .= $this->attachAll('attachment', $this->boundary[1]);
                break;
            case 'alt':
<<<<<<< HEAD
                $body .= $this->getBoundary($this->boundary[1], '', 'text/plain', '');
                $body .= $this->encodeString($this->AltBody, $this->Encoding);
                $body .= $this->LE . $this->LE;
                $body .= $this->getBoundary($this->boundary[1], '', 'text/html', '');
                $body .= $this->encodeString($this->Body, $this->Encoding);
=======
                $body .= $mimepre;
                $body .= $this->getBoundary($this->boundary[1], $altBodyCharSet, 'text/plain', $altBodyEncoding);
                $body .= $this->encodeString($this->AltBody, $altBodyEncoding);
                $body .= $this->LE . $this->LE;
                $body .= $this->getBoundary($this->boundary[1], $bodyCharSet, 'text/html', $bodyEncoding);
                $body .= $this->encodeString($this->Body, $bodyEncoding);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                $body .= $this->LE . $this->LE;
                if (!empty($this->Ical)) {
                    $body .= $this->getBoundary($this->boundary[1], '', 'text/calendar; method=REQUEST', '');
                    $body .= $this->encodeString($this->Ical, $this->Encoding);
                    $body .= $this->LE . $this->LE;
                }
                $body .= $this->endBoundary($this->boundary[1]);
                break;
            case 'alt_inline':
<<<<<<< HEAD
                $body .= $this->getBoundary($this->boundary[1], '', 'text/plain', '');
                $body .= $this->encodeString($this->AltBody, $this->Encoding);
=======
                $body .= $mimepre;
                $body .= $this->getBoundary($this->boundary[1], $altBodyCharSet, 'text/plain', $altBodyEncoding);
                $body .= $this->encodeString($this->AltBody, $altBodyEncoding);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                $body .= $this->LE . $this->LE;
                $body .= $this->textLine('--' . $this->boundary[1]);
                $body .= $this->headerLine('Content-Type', 'multipart/related;');
                $body .= $this->textLine("\tboundary=\"" . $this->boundary[2] . '"');
                $body .= $this->LE;
<<<<<<< HEAD
                $body .= $this->getBoundary($this->boundary[2], '', 'text/html', '');
                $body .= $this->encodeString($this->Body, $this->Encoding);
=======
                $body .= $this->getBoundary($this->boundary[2], $bodyCharSet, 'text/html', $bodyEncoding);
                $body .= $this->encodeString($this->Body, $bodyEncoding);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                $body .= $this->LE . $this->LE;
                $body .= $this->attachAll('inline', $this->boundary[2]);
                $body .= $this->LE;
                $body .= $this->endBoundary($this->boundary[1]);
                break;
            case 'alt_attach':
<<<<<<< HEAD
=======
                $body .= $mimepre;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                $body .= $this->textLine('--' . $this->boundary[1]);
                $body .= $this->headerLine('Content-Type', 'multipart/alternative;');
                $body .= $this->textLine("\tboundary=\"" . $this->boundary[2] . '"');
                $body .= $this->LE;
<<<<<<< HEAD
                $body .= $this->getBoundary($this->boundary[2], '', 'text/plain', '');
                $body .= $this->encodeString($this->AltBody, $this->Encoding);
                $body .= $this->LE . $this->LE;
                $body .= $this->getBoundary($this->boundary[2], '', 'text/html', '');
                $body .= $this->encodeString($this->Body, $this->Encoding);
=======
                $body .= $this->getBoundary($this->boundary[2], $altBodyCharSet, 'text/plain', $altBodyEncoding);
                $body .= $this->encodeString($this->AltBody, $altBodyEncoding);
                $body .= $this->LE . $this->LE;
                $body .= $this->getBoundary($this->boundary[2], $bodyCharSet, 'text/html', $bodyEncoding);
                $body .= $this->encodeString($this->Body, $bodyEncoding);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                $body .= $this->LE . $this->LE;
                $body .= $this->endBoundary($this->boundary[2]);
                $body .= $this->LE;
                $body .= $this->attachAll('attachment', $this->boundary[1]);
                break;
            case 'alt_inline_attach':
<<<<<<< HEAD
=======
                $body .= $mimepre;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                $body .= $this->textLine('--' . $this->boundary[1]);
                $body .= $this->headerLine('Content-Type', 'multipart/alternative;');
                $body .= $this->textLine("\tboundary=\"" . $this->boundary[2] . '"');
                $body .= $this->LE;
<<<<<<< HEAD
                $body .= $this->getBoundary($this->boundary[2], '', 'text/plain', '');
                $body .= $this->encodeString($this->AltBody, $this->Encoding);
=======
                $body .= $this->getBoundary($this->boundary[2], $altBodyCharSet, 'text/plain', $altBodyEncoding);
                $body .= $this->encodeString($this->AltBody, $altBodyEncoding);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                $body .= $this->LE . $this->LE;
                $body .= $this->textLine('--' . $this->boundary[2]);
                $body .= $this->headerLine('Content-Type', 'multipart/related;');
                $body .= $this->textLine("\tboundary=\"" . $this->boundary[3] . '"');
                $body .= $this->LE;
<<<<<<< HEAD
                $body .= $this->getBoundary($this->boundary[3], '', 'text/html', '');
                $body .= $this->encodeString($this->Body, $this->Encoding);
=======
                $body .= $this->getBoundary($this->boundary[3], $bodyCharSet, 'text/html', $bodyEncoding);
                $body .= $this->encodeString($this->Body, $bodyEncoding);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                $body .= $this->LE . $this->LE;
                $body .= $this->attachAll('inline', $this->boundary[3]);
                $body .= $this->LE;
                $body .= $this->endBoundary($this->boundary[2]);
                $body .= $this->LE;
                $body .= $this->attachAll('attachment', $this->boundary[1]);
                break;
            default:
                // catch case 'plain' and case ''
<<<<<<< HEAD
                $body .= $this->encodeString($this->Body, $this->Encoding);
=======
                $body .= $this->encodeString($this->Body, $bodyEncoding);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                break;
        }

        if ($this->isError()) {
            $body = '';
        } elseif ($this->sign_key_file) {
            try {
                if (!defined('PKCS7_TEXT')) {
<<<<<<< HEAD
                    throw new phpmailerException($this->lang('signing') . ' OpenSSL extension missing.');
                }
                $file = tempnam(sys_get_temp_dir(), 'mail');
                file_put_contents($file, $body); //TODO check this worked
                $signed = tempnam(sys_get_temp_dir(), 'signed');
                if (@openssl_pkcs7_sign(
                    $file,
                    $signed,
                    'file://' . realpath($this->sign_cert_file),
                    array('file://' . realpath($this->sign_key_file), $this->sign_key_pass),
                    null
                )
                ) {
                    @unlink($file);
                    $body = file_get_contents($signed);
                    @unlink($signed);
=======
                    throw new phpmailerException($this->lang('extension_missing') . 'openssl');
                }
                // @TODO would be nice to use php://temp streams here, but need to wrap for PHP < 5.1
                $file = tempnam(sys_get_temp_dir(), 'mail');
                if (false === file_put_contents($file, $body)) {
                    throw new phpmailerException($this->lang('signing') . ' Could not write temp file');
                }
                $signed = tempnam(sys_get_temp_dir(), 'signed');
                //Workaround for PHP bug https://bugs.php.net/bug.php?id=69197
                if (empty($this->sign_extracerts_file)) {
                    $sign = @openssl_pkcs7_sign(
                        $file,
                        $signed,
                        'file://' . realpath($this->sign_cert_file),
                        array('file://' . realpath($this->sign_key_file), $this->sign_key_pass),
                        null
                    );
                } else {
                    $sign = @openssl_pkcs7_sign(
                        $file,
                        $signed,
                        'file://' . realpath($this->sign_cert_file),
                        array('file://' . realpath($this->sign_key_file), $this->sign_key_pass),
                        null,
                        PKCS7_DETACHED,
                        $this->sign_extracerts_file
                    );
                }
                if ($sign) {
                    @unlink($file);
                    $body = file_get_contents($signed);
                    @unlink($signed);
                    //The message returned by openssl contains both headers and body, so need to split them up
                    $parts = explode("\n\n", $body, 2);
                    $this->MIMEHeader .= $parts[0] . $this->LE . $this->LE;
                    $body = $parts[1];
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                } else {
                    @unlink($file);
                    @unlink($signed);
                    throw new phpmailerException($this->lang('signing') . openssl_error_string());
                }
<<<<<<< HEAD
            } catch (phpmailerException $e) {
                $body = '';
                if ($this->exceptions) {
                    throw $e;
=======
            } catch (phpmailerException $exc) {
                $body = '';
                if ($this->exceptions) {
                    throw $exc;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                }
            }
        }
        return $body;
    }

    /**
     * Return the start of a message boundary.
     * @access protected
     * @param string $boundary
     * @param string $charSet
     * @param string $contentType
     * @param string $encoding
     * @return string
     */
    protected function getBoundary($boundary, $charSet, $contentType, $encoding)
    {
        $result = '';
        if ($charSet == '') {
            $charSet = $this->CharSet;
        }
        if ($contentType == '') {
            $contentType = $this->ContentType;
        }
        if ($encoding == '') {
            $encoding = $this->Encoding;
        }
        $result .= $this->textLine('--' . $boundary);
<<<<<<< HEAD
        $result .= sprintf("Content-Type: %s; charset=%s", $contentType, $charSet);
        $result .= $this->LE;
        $result .= $this->headerLine('Content-Transfer-Encoding', $encoding);
=======
        $result .= sprintf('Content-Type: %s; charset=%s', $contentType, $charSet);
        $result .= $this->LE;
        // RFC1341 part 5 says 7bit is assumed if not specified
        if ($encoding != '7bit') {
            $result .= $this->headerLine('Content-Transfer-Encoding', $encoding);
        }
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        $result .= $this->LE;

        return $result;
    }

    /**
     * Return the end of a message boundary.
     * @access protected
     * @param string $boundary
     * @return string
     */
    protected function endBoundary($boundary)
    {
        return $this->LE . '--' . $boundary . '--' . $this->LE;
    }

    /**
     * Set the message type.
     * PHPMailer only supports some preset message types,
     * not arbitrary MIME structures.
     * @access protected
     * @return void
     */
    protected function setMessageType()
    {
<<<<<<< HEAD
        $this->message_type = array();
        if ($this->alternativeExists()) {
            $this->message_type[] = "alt";
        }
        if ($this->inlineImageExists()) {
            $this->message_type[] = "inline";
        }
        if ($this->attachmentExists()) {
            $this->message_type[] = "attach";
        }
        $this->message_type = implode("_", $this->message_type);
        if ($this->message_type == "") {
            $this->message_type = "plain";
=======
        $type = array();
        if ($this->alternativeExists()) {
            $type[] = 'alt';
        }
        if ($this->inlineImageExists()) {
            $type[] = 'inline';
        }
        if ($this->attachmentExists()) {
            $type[] = 'attach';
        }
        $this->message_type = implode('_', $type);
        if ($this->message_type == '') {
            $this->message_type = 'plain';
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        }
    }

    /**
     * Format a header line.
     * @access public
     * @param string $name
     * @param string $value
     * @return string
     */
    public function headerLine($name, $value)
    {
        return $name . ': ' . $value . $this->LE;
    }

    /**
     * Return a formatted mail line.
     * @access public
     * @param string $value
     * @return string
     */
    public function textLine($value)
    {
        return $value . $this->LE;
    }

    /**
     * Add an attachment from a path on the filesystem.
     * Returns false if the file could not be found or read.
     * @param string $path Path to the attachment.
     * @param string $name Overrides the attachment name.
     * @param string $encoding File encoding (see $Encoding).
     * @param string $type File extension (MIME) type.
     * @param string $disposition Disposition to use
     * @throws phpmailerException
<<<<<<< HEAD
     * @return bool
=======
     * @return boolean
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    public function addAttachment($path, $name = '', $encoding = 'base64', $type = '', $disposition = 'attachment')
    {
        try {
            if (!@is_file($path)) {
                throw new phpmailerException($this->lang('file_access') . $path, self::STOP_CONTINUE);
            }

<<<<<<< HEAD
            //If a MIME type is not specified, try to work it out from the file name
=======
            // If a MIME type is not specified, try to work it out from the file name
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            if ($type == '') {
                $type = self::filenameToType($path);
            }

            $filename = basename($path);
            if ($name == '') {
                $name = $filename;
            }

            $this->attachment[] = array(
                0 => $path,
                1 => $filename,
                2 => $name,
                3 => $encoding,
                4 => $type,
                5 => false, // isStringAttachment
                6 => $disposition,
                7 => 0
            );

<<<<<<< HEAD
        } catch (phpmailerException $e) {
            $this->setError($e->getMessage());
            if ($this->exceptions) {
                throw $e;
            }
            $this->edebug($e->getMessage() . "\n");
=======
        } catch (phpmailerException $exc) {
            $this->setError($exc->getMessage());
            $this->edebug($exc->getMessage());
            if ($this->exceptions) {
                throw $exc;
            }
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            return false;
        }
        return true;
    }

    /**
     * Return the array of attachments.
     * @return array
     */
    public function getAttachments()
    {
        return $this->attachment;
    }

    /**
     * Attach all file, string, and binary attachments to the message.
     * Returns an empty string on failure.
     * @access protected
     * @param string $disposition_type
     * @param string $boundary
     * @return string
     */
    protected function attachAll($disposition_type, $boundary)
    {
        // Return text of body
        $mime = array();
        $cidUniq = array();
        $incl = array();

        // Add all attachments
        foreach ($this->attachment as $attachment) {
            // Check if it is a valid disposition_filter
            if ($attachment[6] == $disposition_type) {
                // Check for string attachment
                $string = '';
                $path = '';
                $bString = $attachment[5];
                if ($bString) {
                    $string = $attachment[0];
                } else {
                    $path = $attachment[0];
                }

                $inclhash = md5(serialize($attachment));
                if (in_array($inclhash, $incl)) {
                    continue;
                }
                $incl[] = $inclhash;
                $name = $attachment[2];
                $encoding = $attachment[3];
                $type = $attachment[4];
                $disposition = $attachment[6];
                $cid = $attachment[7];
                if ($disposition == 'inline' && isset($cidUniq[$cid])) {
                    continue;
                }
                $cidUniq[$cid] = true;

<<<<<<< HEAD
                $mime[] = sprintf("--%s%s", $boundary, $this->LE);
                $mime[] = sprintf(
                    "Content-Type: %s; name=\"%s\"%s",
=======
                $mime[] = sprintf('--%s%s', $boundary, $this->LE);
                $mime[] = sprintf(
                    'Content-Type: %s; name="%s"%s',
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                    $type,
                    $this->encodeHeader($this->secureHeader($name)),
                    $this->LE
                );
<<<<<<< HEAD
                $mime[] = sprintf("Content-Transfer-Encoding: %s%s", $encoding, $this->LE);

                if ($disposition == 'inline') {
                    $mime[] = sprintf("Content-ID: <%s>%s", $cid, $this->LE);
=======
                // RFC1341 part 5 says 7bit is assumed if not specified
                if ($encoding != '7bit') {
                    $mime[] = sprintf('Content-Transfer-Encoding: %s%s', $encoding, $this->LE);
                }

                if ($disposition == 'inline') {
                    $mime[] = sprintf('Content-ID: <%s>%s', $cid, $this->LE);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                }

                // If a filename contains any of these chars, it should be quoted,
                // but not otherwise: RFC2183 & RFC2045 5.1
                // Fixes a warning in IETF's msglint MIME checker
                // Allow for bypassing the Content-Disposition header totally
                if (!(empty($disposition))) {
<<<<<<< HEAD
                    if (preg_match('/[ \(\)<>@,;:\\"\/\[\]\?=]/', $name)) {
                        $mime[] = sprintf(
                            "Content-Disposition: %s; filename=\"%s\"%s",
                            $disposition,
                            $this->encodeHeader($this->secureHeader($name)),
=======
                    $encoded_name = $this->encodeHeader($this->secureHeader($name));
                    if (preg_match('/[ \(\)<>@,;:\\"\/\[\]\?=]/', $encoded_name)) {
                        $mime[] = sprintf(
                            'Content-Disposition: %s; filename="%s"%s',
                            $disposition,
                            $encoded_name,
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                            $this->LE . $this->LE
                        );
                    } else {
                        $mime[] = sprintf(
<<<<<<< HEAD
                            "Content-Disposition: %s; filename=%s%s",
                            $disposition,
                            $this->encodeHeader($this->secureHeader($name)),
=======
                            'Content-Disposition: %s; filename=%s%s',
                            $disposition,
                            $encoded_name,
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                            $this->LE . $this->LE
                        );
                    }
                } else {
                    $mime[] = $this->LE;
                }

                // Encode as string attachment
                if ($bString) {
                    $mime[] = $this->encodeString($string, $encoding);
                    if ($this->isError()) {
                        return '';
                    }
                    $mime[] = $this->LE . $this->LE;
                } else {
                    $mime[] = $this->encodeFile($path, $encoding);
                    if ($this->isError()) {
                        return '';
                    }
                    $mime[] = $this->LE . $this->LE;
                }
            }
        }

<<<<<<< HEAD
        $mime[] = sprintf("--%s--%s", $boundary, $this->LE);

        return implode("", $mime);
=======
        $mime[] = sprintf('--%s--%s', $boundary, $this->LE);

        return implode('', $mime);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
    }

    /**
     * Encode a file attachment in requested format.
     * Returns an empty string on failure.
     * @param string $path The full path to the file
     * @param string $encoding The encoding to use; one of 'base64', '7bit', '8bit', 'binary', 'quoted-printable'
     * @throws phpmailerException
     * @see EncodeFile(encodeFile
     * @access protected
     * @return string
     */
    protected function encodeFile($path, $encoding = 'base64')
    {
        try {
            if (!is_readable($path)) {
                throw new phpmailerException($this->lang('file_open') . $path, self::STOP_CONTINUE);
            }
            $magic_quotes = get_magic_quotes_runtime();
            if ($magic_quotes) {
                if (version_compare(PHP_VERSION, '5.3.0', '<')) {
<<<<<<< HEAD
                    set_magic_quotes_runtime(0);
                } else {
                    ini_set('magic_quotes_runtime', 0);
=======
                    set_magic_quotes_runtime(false);
                } else {
                    //Doesn't exist in PHP 5.4, but we don't need to check because
                    //get_magic_quotes_runtime always returns false in 5.4+
                    //so it will never get here
                    ini_set('magic_quotes_runtime', false);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                }
            }
            $file_buffer = file_get_contents($path);
            $file_buffer = $this->encodeString($file_buffer, $encoding);
            if ($magic_quotes) {
                if (version_compare(PHP_VERSION, '5.3.0', '<')) {
                    set_magic_quotes_runtime($magic_quotes);
                } else {
                    ini_set('magic_quotes_runtime', $magic_quotes);
                }
            }
            return $file_buffer;
<<<<<<< HEAD
        } catch (Exception $e) {
            $this->setError($e->getMessage());
=======
        } catch (Exception $exc) {
            $this->setError($exc->getMessage());
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            return '';
        }
    }

    /**
     * Encode a string in requested format.
     * Returns an empty string on failure.
     * @param string $str The text to encode
     * @param string $encoding The encoding to use; one of 'base64', '7bit', '8bit', 'binary', 'quoted-printable'
     * @access public
     * @return string
     */
    public function encodeString($str, $encoding = 'base64')
    {
        $encoded = '';
        switch (strtolower($encoding)) {
            case 'base64':
                $encoded = chunk_split(base64_encode($str), 76, $this->LE);
                break;
            case '7bit':
            case '8bit':
                $encoded = $this->fixEOL($str);
<<<<<<< HEAD
                //Make sure it ends with a line break
=======
                // Make sure it ends with a line break
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                if (substr($encoded, -(strlen($this->LE))) != $this->LE) {
                    $encoded .= $this->LE;
                }
                break;
            case 'binary':
                $encoded = $str;
                break;
            case 'quoted-printable':
                $encoded = $this->encodeQP($str);
                break;
            default:
                $this->setError($this->lang('encoding') . $encoding);
                break;
        }
        return $encoded;
    }

    /**
     * Encode a header string optimally.
     * Picks shortest of Q, B, quoted-printable or none.
     * @access public
     * @param string $str
     * @param string $position
     * @return string
     */
    public function encodeHeader($str, $position = 'text')
    {
<<<<<<< HEAD
        $x = 0;
        switch (strtolower($position)) {
            case 'phrase':
                if (!preg_match('/[\200-\377]/', $str)) {
                    // Can't use addslashes as we don't know what value has magic_quotes_sybase
=======
        $matchcount = 0;
        switch (strtolower($position)) {
            case 'phrase':
                if (!preg_match('/[\200-\377]/', $str)) {
                    // Can't use addslashes as we don't know the value of magic_quotes_sybase
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                    $encoded = addcslashes($str, "\0..\37\177\\\"");
                    if (($str == $encoded) && !preg_match('/[^A-Za-z0-9!#$%&\'*+\/=?^_`{|}~ -]/', $str)) {
                        return ($encoded);
                    } else {
                        return ("\"$encoded\"");
                    }
                }
<<<<<<< HEAD
                $x = preg_match_all('/[^\040\041\043-\133\135-\176]/', $str, $matches);
                break;
            /** @noinspection PhpMissingBreakStatementInspection */
            case 'comment':
                $x = preg_match_all('/[()"]/', $str, $matches);
                // Intentional fall-through
            case 'text':
            default:
                $x += preg_match_all('/[\000-\010\013\014\016-\037\177-\377]/', $str, $matches);
                break;
        }

        if ($x == 0) { //There are no chars that need encoding
=======
                $matchcount = preg_match_all('/[^\040\041\043-\133\135-\176]/', $str, $matches);
                break;
            /** @noinspection PhpMissingBreakStatementInspection */
            case 'comment':
                $matchcount = preg_match_all('/[()"]/', $str, $matches);
                // Intentional fall-through
            case 'text':
            default:
                $matchcount += preg_match_all('/[\000-\010\013\014\016-\037\177-\377]/', $str, $matches);
                break;
        }

        //There are no chars that need encoding
        if ($matchcount == 0) {
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            return ($str);
        }

        $maxlen = 75 - 7 - strlen($this->CharSet);
        // Try to select the encoding which should produce the shortest output
<<<<<<< HEAD
        if ($x > strlen($str) / 3) {
            //More than a third of the content will need encoding, so B encoding will be most efficient
=======
        if ($matchcount > strlen($str) / 3) {
            // More than a third of the content will need encoding, so B encoding will be most efficient
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            $encoding = 'B';
            if (function_exists('mb_strlen') && $this->hasMultiBytes($str)) {
                // Use a custom function which correctly encodes and wraps long
                // multibyte strings without breaking lines within a character
                $encoded = $this->base64EncodeWrapMB($str, "\n");
            } else {
                $encoded = base64_encode($str);
                $maxlen -= $maxlen % 4;
                $encoded = trim(chunk_split($encoded, $maxlen, "\n"));
            }
        } else {
            $encoding = 'Q';
            $encoded = $this->encodeQ($str, $position);
            $encoded = $this->wrapText($encoded, $maxlen, true);
            $encoded = str_replace('=' . self::CRLF, "\n", trim($encoded));
        }

<<<<<<< HEAD
        $encoded = preg_replace('/^(.*)$/m', " =?" . $this->CharSet . "?$encoding?\\1?=", $encoded);
=======
        $encoded = preg_replace('/^(.*)$/m', ' =?' . $this->CharSet . "?$encoding?\\1?=", $encoded);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        $encoded = trim(str_replace("\n", $this->LE, $encoded));

        return $encoded;
    }

    /**
     * Check if a string contains multi-byte characters.
     * @access public
     * @param string $str multi-byte text to wrap encode
<<<<<<< HEAD
     * @return bool
=======
     * @return boolean
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    public function hasMultiBytes($str)
    {
        if (function_exists('mb_strlen')) {
            return (strlen($str) > mb_strlen($str, $this->CharSet));
        } else { // Assume no multibytes (we can't handle without mbstring functions anyway)
            return false;
        }
    }

    /**
<<<<<<< HEAD
     * Encode and wrap long multibyte strings for mail headers
     * without breaking lines within a character.
     * Adapted from a function by paravoid at http://uk.php.net/manual/en/function.mb-encode-mimeheader.php
     * @access public
     * @param string $str multi-byte text to wrap encode
     * @param string $lf string to use as linefeed/end-of-line
     * @return string
     */
    public function base64EncodeWrapMB($str, $lf = null)
    {
        $start = "=?" . $this->CharSet . "?B?";
        $end = "?=";
        $encoded = "";
        if ($lf === null) {
            $lf = $this->LE;
=======
     * Does a string contain any 8-bit chars (in any charset)?
     * @param string $text
     * @return boolean
     */
    public function has8bitChars($text)
    {
        return (boolean)preg_match('/[\x80-\xFF]/', $text);
    }

    /**
     * Encode and wrap long multibyte strings for mail headers
     * without breaking lines within a character.
     * Adapted from a function by paravoid
     * @link http://www.php.net/manual/en/function.mb-encode-mimeheader.php#60283
     * @access public
     * @param string $str multi-byte text to wrap encode
     * @param string $linebreak string to use as linefeed/end-of-line
     * @return string
     */
    public function base64EncodeWrapMB($str, $linebreak = null)
    {
        $start = '=?' . $this->CharSet . '?B?';
        $end = '?=';
        $encoded = '';
        if ($linebreak === null) {
            $linebreak = $this->LE;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        }

        $mb_length = mb_strlen($str, $this->CharSet);
        // Each line must have length <= 75, including $start and $end
        $length = 75 - strlen($start) - strlen($end);
        // Average multi-byte ratio
        $ratio = $mb_length / strlen($str);
        // Base64 has a 4:3 ratio
        $avgLength = floor($length * $ratio * .75);

        for ($i = 0; $i < $mb_length; $i += $offset) {
            $lookBack = 0;
            do {
                $offset = $avgLength - $lookBack;
                $chunk = mb_substr($str, $i, $offset, $this->CharSet);
                $chunk = base64_encode($chunk);
                $lookBack++;
            } while (strlen($chunk) > $length);
<<<<<<< HEAD
            $encoded .= $chunk . $lf;
        }

        // Chomp the last linefeed
        $encoded = substr($encoded, 0, -strlen($lf));
=======
            $encoded .= $chunk . $linebreak;
        }

        // Chomp the last linefeed
        $encoded = substr($encoded, 0, -strlen($linebreak));
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        return $encoded;
    }

    /**
     * Encode a string in quoted-printable format.
     * According to RFC2045 section 6.7.
     * @access public
     * @param string $string The text to encode
     * @param integer $line_max Number of chars allowed on a line before wrapping
     * @return string
<<<<<<< HEAD
     * @link PHP version adapted from http://www.php.net/manual/en/function.quoted-printable-decode.php#89417
     */
    public function encodeQP($string, $line_max = 76)
    {
        if (function_exists('quoted_printable_encode')) { //Use native function if it's available (>= PHP5.3)
            return quoted_printable_encode($string);
        }
        //Fall back to a pure PHP implementation
=======
     * @link http://www.php.net/manual/en/function.quoted-printable-decode.php#89417 Adapted from this comment
     */
    public function encodeQP($string, $line_max = 76)
    {
        // Use native function if it's available (>= PHP5.3)
        if (function_exists('quoted_printable_encode')) {
            return $this->fixEOL(quoted_printable_encode($string));
        }
        // Fall back to a pure PHP implementation
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        $string = str_replace(
            array('%20', '%0D%0A.', '%0D%0A', '%'),
            array(' ', "\r\n=2E", "\r\n", '='),
            rawurlencode($string)
        );
        $string = preg_replace('/[^\r\n]{' . ($line_max - 3) . '}[^=\r\n]{2}/', "$0=\r\n", $string);
<<<<<<< HEAD
        return $string;
=======
        return $this->fixEOL($string);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
    }

    /**
     * Backward compatibility wrapper for an old QP encoding function that was removed.
     * @see PHPMailer::encodeQP()
     * @access public
     * @param string $string
     * @param integer $line_max
<<<<<<< HEAD
     * @param bool $space_conv
=======
     * @param boolean $space_conv
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     * @return string
     * @deprecated Use encodeQP instead.
     */
    public function encodeQPphp(
        $string,
        $line_max = 76,
        /** @noinspection PhpUnusedParameterInspection */ $space_conv = false
    ) {
        return $this->encodeQP($string, $line_max);
    }

    /**
     * Encode a string using Q encoding.
     * @link http://tools.ietf.org/html/rfc2047
     * @param string $str the text to encode
     * @param string $position Where the text is going to be used, see the RFC for what that means
     * @access public
     * @return string
     */
    public function encodeQ($str, $position = 'text')
    {
<<<<<<< HEAD
        //There should not be any EOL in the string
=======
        // There should not be any EOL in the string
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        $pattern = '';
        $encoded = str_replace(array("\r", "\n"), '', $str);
        switch (strtolower($position)) {
            case 'phrase':
<<<<<<< HEAD
                //RFC 2047 section 5.3
=======
                // RFC 2047 section 5.3
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                $pattern = '^A-Za-z0-9!*+\/ -';
                break;
            /** @noinspection PhpMissingBreakStatementInspection */
            case 'comment':
<<<<<<< HEAD
                //RFC 2047 section 5.2
                $pattern = '\(\)"';
                //intentional fall-through
                //for this reason we build the $pattern without including delimiters and []
            case 'text':
            default:
                //RFC 2047 section 5.1
                //Replace every high ascii, control, =, ? and _ characters
=======
                // RFC 2047 section 5.2
                $pattern = '\(\)"';
                // intentional fall-through
                // for this reason we build the $pattern without including delimiters and []
            case 'text':
            default:
                // RFC 2047 section 5.1
                // Replace every high ascii, control, =, ? and _ characters
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                $pattern = '\000-\011\013\014\016-\037\075\077\137\177-\377' . $pattern;
                break;
        }
        $matches = array();
        if (preg_match_all("/[{$pattern}]/", $encoded, $matches)) {
<<<<<<< HEAD
            //If the string contains an '=', make sure it's the first thing we replace
            //so as to avoid double-encoding
            $s = array_search('=', $matches[0]);
            if ($s !== false) {
                unset($matches[0][$s]);
=======
            // If the string contains an '=', make sure it's the first thing we replace
            // so as to avoid double-encoding
            $eqkey = array_search('=', $matches[0]);
            if (false !== $eqkey) {
                unset($matches[0][$eqkey]);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                array_unshift($matches[0], '=');
            }
            foreach (array_unique($matches[0]) as $char) {
                $encoded = str_replace($char, '=' . sprintf('%02X', ord($char)), $encoded);
            }
        }
<<<<<<< HEAD
        //Replace every spaces to _ (more readable than =20)
=======
        // Replace every spaces to _ (more readable than =20)
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        return str_replace(' ', '_', $encoded);
    }


    /**
     * Add a string or binary attachment (non-filesystem).
     * This method can be used to attach ascii or binary data,
     * such as a BLOB record from a database.
     * @param string $string String attachment data.
     * @param string $filename Name of the attachment.
     * @param string $encoding File encoding (see $Encoding).
     * @param string $type File extension (MIME) type.
     * @param string $disposition Disposition to use
     * @return void
     */
    public function addStringAttachment(
        $string,
        $filename,
        $encoding = 'base64',
        $type = '',
        $disposition = 'attachment'
    ) {
<<<<<<< HEAD
        //If a MIME type is not specified, try to work it out from the file name
=======
        // If a MIME type is not specified, try to work it out from the file name
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        if ($type == '') {
            $type = self::filenameToType($filename);
        }
        // Append to $attachment array
        $this->attachment[] = array(
            0 => $string,
            1 => $filename,
            2 => basename($filename),
            3 => $encoding,
            4 => $type,
            5 => true, // isStringAttachment
            6 => $disposition,
            7 => 0
        );
    }

    /**
     * Add an embedded (inline) attachment from a file.
     * This can include images, sounds, and just about any other document type.
<<<<<<< HEAD
     * These differ from 'regular' attachmants in that they are intended to be
=======
     * These differ from 'regular' attachments in that they are intended to be
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     * displayed inline with the message, not just attached for download.
     * This is used in HTML messages that embed the images
     * the HTML refers to using the $cid value.
     * @param string $path Path to the attachment.
     * @param string $cid Content ID of the attachment; Use this to reference
     *        the content when using an embedded image in HTML.
     * @param string $name Overrides the attachment name.
     * @param string $encoding File encoding (see $Encoding).
     * @param string $type File MIME type.
     * @param string $disposition Disposition to use
<<<<<<< HEAD
     * @return bool True on successfully adding an attachment
=======
     * @return boolean True on successfully adding an attachment
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    public function addEmbeddedImage($path, $cid, $name = '', $encoding = 'base64', $type = '', $disposition = 'inline')
    {
        if (!@is_file($path)) {
            $this->setError($this->lang('file_access') . $path);
            return false;
        }

<<<<<<< HEAD
        //If a MIME type is not specified, try to work it out from the file name
=======
        // If a MIME type is not specified, try to work it out from the file name
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        if ($type == '') {
            $type = self::filenameToType($path);
        }

        $filename = basename($path);
        if ($name == '') {
            $name = $filename;
        }

        // Append to $attachment array
        $this->attachment[] = array(
            0 => $path,
            1 => $filename,
            2 => $name,
            3 => $encoding,
            4 => $type,
            5 => false, // isStringAttachment
            6 => $disposition,
            7 => $cid
        );
        return true;
    }

    /**
     * Add an embedded stringified attachment.
     * This can include images, sounds, and just about any other document type.
     * Be sure to set the $type to an image type for images:
     * JPEG images use 'image/jpeg', GIF uses 'image/gif', PNG uses 'image/png'.
     * @param string $string The attachment binary data.
     * @param string $cid Content ID of the attachment; Use this to reference
     *        the content when using an embedded image in HTML.
     * @param string $name
     * @param string $encoding File encoding (see $Encoding).
     * @param string $type MIME type.
     * @param string $disposition Disposition to use
<<<<<<< HEAD
     * @return bool True on successfully adding an attachment
=======
     * @return boolean True on successfully adding an attachment
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    public function addStringEmbeddedImage(
        $string,
        $cid,
        $name = '',
        $encoding = 'base64',
        $type = '',
        $disposition = 'inline'
    ) {
<<<<<<< HEAD
        //If a MIME type is not specified, try to work it out from the name
=======
        // If a MIME type is not specified, try to work it out from the name
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        if ($type == '') {
            $type = self::filenameToType($name);
        }

        // Append to $attachment array
        $this->attachment[] = array(
            0 => $string,
            1 => $name,
            2 => $name,
            3 => $encoding,
            4 => $type,
            5 => true, // isStringAttachment
            6 => $disposition,
            7 => $cid
        );
        return true;
    }

    /**
     * Check if an inline attachment is present.
     * @access public
<<<<<<< HEAD
     * @return bool
=======
     * @return boolean
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    public function inlineImageExists()
    {
        foreach ($this->attachment as $attachment) {
            if ($attachment[6] == 'inline') {
                return true;
            }
        }
        return false;
    }

    /**
     * Check if an attachment (non-inline) is present.
<<<<<<< HEAD
     * @return bool
=======
     * @return boolean
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    public function attachmentExists()
    {
        foreach ($this->attachment as $attachment) {
            if ($attachment[6] == 'attachment') {
                return true;
            }
        }
        return false;
    }

    /**
     * Check if this message has an alternative body set.
<<<<<<< HEAD
     * @return bool
=======
     * @return boolean
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    public function alternativeExists()
    {
        return !empty($this->AltBody);
    }

    /**
     * Clear all To recipients.
     * @return void
     */
    public function clearAddresses()
    {
        foreach ($this->to as $to) {
            unset($this->all_recipients[strtolower($to[0])]);
        }
        $this->to = array();
    }

    /**
     * Clear all CC recipients.
     * @return void
     */
    public function clearCCs()
    {
        foreach ($this->cc as $cc) {
            unset($this->all_recipients[strtolower($cc[0])]);
        }
        $this->cc = array();
    }

    /**
     * Clear all BCC recipients.
     * @return void
     */
    public function clearBCCs()
    {
        foreach ($this->bcc as $bcc) {
            unset($this->all_recipients[strtolower($bcc[0])]);
        }
        $this->bcc = array();
    }

    /**
     * Clear all ReplyTo recipients.
     * @return void
     */
    public function clearReplyTos()
    {
        $this->ReplyTo = array();
    }

    /**
     * Clear all recipient types.
     * @return void
     */
    public function clearAllRecipients()
    {
        $this->to = array();
        $this->cc = array();
        $this->bcc = array();
        $this->all_recipients = array();
    }

    /**
     * Clear all filesystem, string, and binary attachments.
     * @return void
     */
    public function clearAttachments()
    {
        $this->attachment = array();
    }

    /**
     * Clear all custom headers.
     * @return void
     */
    public function clearCustomHeaders()
    {
        $this->CustomHeader = array();
    }

    /**
     * Add an error message to the error container.
     * @access protected
     * @param string $msg
     * @return void
     */
    protected function setError($msg)
    {
        $this->error_count++;
        if ($this->Mailer == 'smtp' and !is_null($this->smtp)) {
            $lasterror = $this->smtp->getError();
<<<<<<< HEAD
            if (!empty($lasterror) and array_key_exists('smtp_msg', $lasterror)) {
                $msg .= '<p>' . $this->lang('smtp_error') . $lasterror['smtp_msg'] . "</p>\n";
=======
            if (!empty($lasterror['error'])) {
                $msg .= $this->lang('smtp_error') . $lasterror['error'];
                if (!empty($lasterror['detail'])) {
                    $msg .= ' Detail: '. $lasterror['detail'];
                }
                if (!empty($lasterror['smtp_code'])) {
                    $msg .= ' SMTP code: ' . $lasterror['smtp_code'];
                }
                if (!empty($lasterror['smtp_code_ex'])) {
                    $msg .= ' Additional SMTP info: ' . $lasterror['smtp_code_ex'];
                }
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            }
        }
        $this->ErrorInfo = $msg;
    }

    /**
     * Return an RFC 822 formatted date.
     * @access public
     * @return string
     * @static
     */
    public static function rfcDate()
    {
<<<<<<< HEAD
        //Set the time zone to whatever the default is to avoid 500 errors
        //Will default to UTC if it's not set properly in php.ini
=======
        // Set the time zone to whatever the default is to avoid 500 errors
        // Will default to UTC if it's not set properly in php.ini
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        date_default_timezone_set(@date_default_timezone_get());
        return date('D, j M Y H:i:s O');
    }

    /**
     * Get the server hostname.
     * Returns 'localhost.localdomain' if unknown.
     * @access protected
     * @return string
     */
    protected function serverHostname()
    {
<<<<<<< HEAD
        if (!empty($this->Hostname)) {
            $result = $this->Hostname;
        } elseif (isset($_SERVER['SERVER_NAME'])) {
            $result = $_SERVER['SERVER_NAME'];
        } else {
            $result = 'localhost.localdomain';
        }

=======
        $result = 'localhost.localdomain';
        if (!empty($this->Hostname)) {
            $result = $this->Hostname;
        } elseif (isset($_SERVER) and array_key_exists('SERVER_NAME', $_SERVER) and !empty($_SERVER['SERVER_NAME'])) {
            $result = $_SERVER['SERVER_NAME'];
        } elseif (function_exists('gethostname') && gethostname() !== false) {
            $result = gethostname();
        } elseif (php_uname('n') !== false) {
            $result = php_uname('n');
        }
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        return $result;
    }

    /**
     * Get an error message in the current language.
     * @access protected
     * @param string $key
     * @return string
     */
    protected function lang($key)
    {
        if (count($this->language) < 1) {
            $this->setLanguage('en'); // set the default language
        }

<<<<<<< HEAD
        if (isset($this->language[$key])) {
            return $this->language[$key];
        } else {
            return 'Language string failed to load: ' . $key;
=======
        if (array_key_exists($key, $this->language)) {
            if ($key == 'smtp_connect_failed') {
                //Include a link to troubleshooting docs on SMTP connection failure
                //this is by far the biggest cause of support questions
                //but it's usually not PHPMailer's fault.
                return $this->language[$key] . ' https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting';
            }
            return $this->language[$key];
        } else {
            //Return the key as a fallback
            return $key;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        }
    }

    /**
     * Check if an error occurred.
     * @access public
<<<<<<< HEAD
     * @return bool True if an error did occur.
=======
     * @return boolean True if an error did occur.
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     */
    public function isError()
    {
        return ($this->error_count > 0);
    }

    /**
     * Ensure consistent line endings in a string.
     * Changes every end of line from CRLF, CR or LF to $this->LE.
     * @access public
     * @param string $str String to fixEOL
     * @return string
     */
    public function fixEOL($str)
    {
        // Normalise to \n
        $nstr = str_replace(array("\r\n", "\r"), "\n", $str);
        // Now convert LE as needed
        if ($this->LE !== "\n") {
            $nstr = str_replace("\n", $this->LE, $nstr);
        }
        return $nstr;
    }

    /**
     * Add a custom header.
     * $name value can be overloaded to contain
     * both header name and value (name:value)
     * @access public
     * @param string $name Custom header name
     * @param string $value Header value
     * @return void
     */
    public function addCustomHeader($name, $value = null)
    {
        if ($value === null) {
            // Value passed in as name:value
            $this->CustomHeader[] = explode(':', $name, 2);
        } else {
            $this->CustomHeader[] = array($name, $value);
        }
    }

    /**
<<<<<<< HEAD
=======
     * Returns all custom headers
     *
     * @return array
     */
    public function getCustomHeaders()
    {
        return $this->CustomHeader;
    }

    /**
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     * Create a message from an HTML string.
     * Automatically makes modifications for inline images and backgrounds
     * and creates a plain-text version by converting the HTML.
     * Overwrites any existing values in $this->Body and $this->AltBody
     * @access public
     * @param string $message HTML message string
     * @param string $basedir baseline directory for path
<<<<<<< HEAD
     * @param bool $advanced Whether to use the advanced HTML to text converter
=======
     * @param boolean|callable $advanced Whether to use the internal HTML to text converter
     *    or your own custom converter @see html2text()
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     * @return string $message
     */
    public function msgHTML($message, $basedir = '', $advanced = false)
    {
<<<<<<< HEAD
        preg_match_all("/(src|background)=[\"'](.*)[\"']/Ui", $message, $images);
        if (isset($images[2])) {
            foreach ($images[2] as $i => $url) {
                // do not change urls for absolute images (thanks to corvuscorax)
                if (!preg_match('#^[A-z]+://#', $url)) {
=======
        preg_match_all('/(src|background)=["\'](.*)["\']/Ui', $message, $images);
        if (isset($images[2])) {
            foreach ($images[2] as $imgindex => $url) {
                // Convert data URIs into embedded images
                if (preg_match('#^data:(image[^;,]*)(;base64)?,#', $url, $match)) {
                    $data = substr($url, strpos($url, ','));
                    if ($match[2]) {
                        $data = base64_decode($data);
                    } else {
                        $data = rawurldecode($data);
                    }
                    $cid = md5($url) . '@phpmailer.0'; // RFC2392 S 2
                    if ($this->addStringEmbeddedImage($data, $cid, '', 'base64', $match[1])) {
                        $message = str_replace(
                            $images[0][$imgindex],
                            $images[1][$imgindex] . '="cid:' . $cid . '"',
                            $message
                        );
                    }
                } elseif (!preg_match('#^[A-z]+://#', $url)) {
                    // Do not change urls for absolute images (thanks to corvuscorax)
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                    $filename = basename($url);
                    $directory = dirname($url);
                    if ($directory == '.') {
                        $directory = '';
                    }
<<<<<<< HEAD
                    $cid = md5($url) . '@phpmailer.0'; //RFC2392 S 2
=======
                    $cid = md5($url) . '@phpmailer.0'; // RFC2392 S 2
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                    if (strlen($basedir) > 1 && substr($basedir, -1) != '/') {
                        $basedir .= '/';
                    }
                    if (strlen($directory) > 1 && substr($directory, -1) != '/') {
                        $directory .= '/';
                    }
                    if ($this->addEmbeddedImage(
                        $basedir . $directory . $filename,
                        $cid,
                        $filename,
                        'base64',
<<<<<<< HEAD
                        self::_mime_types(self::mb_pathinfo($filename, PATHINFO_EXTENSION))
                    )
                    ) {
                        $message = preg_replace(
                            "/" . $images[1][$i] . "=[\"']" . preg_quote($url, '/') . "[\"']/Ui",
                            $images[1][$i] . "=\"cid:" . $cid . "\"",
=======
                        self::_mime_types((string)self::mb_pathinfo($filename, PATHINFO_EXTENSION))
                    )
                    ) {
                        $message = preg_replace(
                            '/' . $images[1][$imgindex] . '=["\']' . preg_quote($url, '/') . '["\']/Ui',
                            $images[1][$imgindex] . '="cid:' . $cid . '"',
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                            $message
                        );
                    }
                }
            }
        }
        $this->isHTML(true);
<<<<<<< HEAD
        if (empty($this->AltBody)) {
            $this->AltBody = 'To view this email message, open it in a program that understands HTML!' . "\n\n";
        }
        //Convert all message body line breaks to CRLF, makes quoted-printable encoding work much better
        $this->Body = $this->normalizeBreaks($message);
        $this->AltBody = $this->normalizeBreaks($this->html2text($message, $advanced));
=======
        // Convert all message body line breaks to CRLF, makes quoted-printable encoding work much better
        $this->Body = $this->normalizeBreaks($message);
        $this->AltBody = $this->normalizeBreaks($this->html2text($message, $advanced));
        if (empty($this->AltBody)) {
            $this->AltBody = 'To view this email message, open it in a program that understands HTML!' .
                self::CRLF . self::CRLF;
        }
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        return $this->Body;
    }

    /**
     * Convert an HTML string into plain text.
<<<<<<< HEAD
     * @param string $html The HTML text to convert
     * @param bool $advanced Should this use the more complex html2text converter or just a simple one?
=======
     * This is used by msgHTML().
     * Note - older versions of this function used a bundled advanced converter
     * which was been removed for license reasons in #232
     * Example usage:
     * <code>
     * // Use default conversion
     * $plain = $mail->html2text($html);
     * // Use your own custom converter
     * $plain = $mail->html2text($html, function($html) {
     *     $converter = new MyHtml2text($html);
     *     return $converter->get_text();
     * });
     * </code>
     * @param string $html The HTML text to convert
     * @param boolean|callable $advanced Any boolean value to use the internal converter,
     *   or provide your own callable for custom conversion.
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     * @return string
     */
    public function html2text($html, $advanced = false)
    {
<<<<<<< HEAD
        if ($advanced) {
            require_once 'extras/class.html2text.php';
            $h = new html2text($html);
            return $h->get_text();
=======
        if (is_callable($advanced)) {
            return call_user_func($advanced, $html);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        }
        return html_entity_decode(
            trim(strip_tags(preg_replace('/<(head|title|style|script)[^>]*>.*?<\/\\1>/si', '', $html))),
            ENT_QUOTES,
            $this->CharSet
        );
    }

    /**
     * Get the MIME type for a file extension.
     * @param string $ext File extension
     * @access public
     * @return string MIME type of file.
     * @static
     */
    public static function _mime_types($ext = '')
    {
        $mimes = array(
<<<<<<< HEAD
            'xl' => 'application/excel',
            'hqx' => 'application/mac-binhex40',
            'cpt' => 'application/mac-compactpro',
            'bin' => 'application/macbinary',
            'doc' => 'application/msword',
            'word' => 'application/msword',
            'class' => 'application/octet-stream',
            'dll' => 'application/octet-stream',
            'dms' => 'application/octet-stream',
            'exe' => 'application/octet-stream',
            'lha' => 'application/octet-stream',
            'lzh' => 'application/octet-stream',
            'psd' => 'application/octet-stream',
            'sea' => 'application/octet-stream',
            'so' => 'application/octet-stream',
            'oda' => 'application/oda',
            'pdf' => 'application/pdf',
            'ai' => 'application/postscript',
            'eps' => 'application/postscript',
            'ps' => 'application/postscript',
            'smi' => 'application/smil',
            'smil' => 'application/smil',
            'mif' => 'application/vnd.mif',
            'xls' => 'application/vnd.ms-excel',
            'ppt' => 'application/vnd.ms-powerpoint',
            'wbxml' => 'application/vnd.wap.wbxml',
            'wmlc' => 'application/vnd.wap.wmlc',
            'dcr' => 'application/x-director',
            'dir' => 'application/x-director',
            'dxr' => 'application/x-director',
            'dvi' => 'application/x-dvi',
            'gtar' => 'application/x-gtar',
            'php3' => 'application/x-httpd-php',
            'php4' => 'application/x-httpd-php',
            'php' => 'application/x-httpd-php',
            'phtml' => 'application/x-httpd-php',
            'phps' => 'application/x-httpd-php-source',
            'js' => 'application/x-javascript',
            'swf' => 'application/x-shockwave-flash',
            'sit' => 'application/x-stuffit',
            'tar' => 'application/x-tar',
            'tgz' => 'application/x-tar',
            'xht' => 'application/xhtml+xml',
            'xhtml' => 'application/xhtml+xml',
            'zip' => 'application/zip',
            'mid' => 'audio/midi',
            'midi' => 'audio/midi',
            'mp2' => 'audio/mpeg',
            'mp3' => 'audio/mpeg',
            'mpga' => 'audio/mpeg',
            'aif' => 'audio/x-aiff',
            'aifc' => 'audio/x-aiff',
            'aiff' => 'audio/x-aiff',
            'ram' => 'audio/x-pn-realaudio',
            'rm' => 'audio/x-pn-realaudio',
            'rpm' => 'audio/x-pn-realaudio-plugin',
            'ra' => 'audio/x-realaudio',
            'wav' => 'audio/x-wav',
            'bmp' => 'image/bmp',
            'gif' => 'image/gif',
            'jpeg' => 'image/jpeg',
            'jpe' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'eml' => 'message/rfc822',
            'css' => 'text/css',
            'html' => 'text/html',
            'htm' => 'text/html',
            'shtml' => 'text/html',
            'log' => 'text/plain',
            'text' => 'text/plain',
            'txt' => 'text/plain',
            'rtx' => 'text/richtext',
            'rtf' => 'text/rtf',
            'xml' => 'text/xml',
            'xsl' => 'text/xml',
            'mpeg' => 'video/mpeg',
            'mpe' => 'video/mpeg',
            'mpg' => 'video/mpeg',
            'mov' => 'video/quicktime',
            'qt' => 'video/quicktime',
            'rv' => 'video/vnd.rn-realvideo',
            'avi' => 'video/x-msvideo',
            'movie' => 'video/x-sgi-movie'
        );
        return (array_key_exists(strtolower($ext), $mimes) ? $mimes[strtolower($ext)]: 'application/octet-stream');
=======
            'xl'    => 'application/excel',
            'js'    => 'application/javascript',
            'hqx'   => 'application/mac-binhex40',
            'cpt'   => 'application/mac-compactpro',
            'bin'   => 'application/macbinary',
            'doc'   => 'application/msword',
            'word'  => 'application/msword',
            'class' => 'application/octet-stream',
            'dll'   => 'application/octet-stream',
            'dms'   => 'application/octet-stream',
            'exe'   => 'application/octet-stream',
            'lha'   => 'application/octet-stream',
            'lzh'   => 'application/octet-stream',
            'psd'   => 'application/octet-stream',
            'sea'   => 'application/octet-stream',
            'so'    => 'application/octet-stream',
            'oda'   => 'application/oda',
            'pdf'   => 'application/pdf',
            'ai'    => 'application/postscript',
            'eps'   => 'application/postscript',
            'ps'    => 'application/postscript',
            'smi'   => 'application/smil',
            'smil'  => 'application/smil',
            'mif'   => 'application/vnd.mif',
            'xls'   => 'application/vnd.ms-excel',
            'ppt'   => 'application/vnd.ms-powerpoint',
            'wbxml' => 'application/vnd.wap.wbxml',
            'wmlc'  => 'application/vnd.wap.wmlc',
            'dcr'   => 'application/x-director',
            'dir'   => 'application/x-director',
            'dxr'   => 'application/x-director',
            'dvi'   => 'application/x-dvi',
            'gtar'  => 'application/x-gtar',
            'php3'  => 'application/x-httpd-php',
            'php4'  => 'application/x-httpd-php',
            'php'   => 'application/x-httpd-php',
            'phtml' => 'application/x-httpd-php',
            'phps'  => 'application/x-httpd-php-source',
            'swf'   => 'application/x-shockwave-flash',
            'sit'   => 'application/x-stuffit',
            'tar'   => 'application/x-tar',
            'tgz'   => 'application/x-tar',
            'xht'   => 'application/xhtml+xml',
            'xhtml' => 'application/xhtml+xml',
            'zip'   => 'application/zip',
            'mid'   => 'audio/midi',
            'midi'  => 'audio/midi',
            'mp2'   => 'audio/mpeg',
            'mp3'   => 'audio/mpeg',
            'mpga'  => 'audio/mpeg',
            'aif'   => 'audio/x-aiff',
            'aifc'  => 'audio/x-aiff',
            'aiff'  => 'audio/x-aiff',
            'ram'   => 'audio/x-pn-realaudio',
            'rm'    => 'audio/x-pn-realaudio',
            'rpm'   => 'audio/x-pn-realaudio-plugin',
            'ra'    => 'audio/x-realaudio',
            'wav'   => 'audio/x-wav',
            'bmp'   => 'image/bmp',
            'gif'   => 'image/gif',
            'jpeg'  => 'image/jpeg',
            'jpe'   => 'image/jpeg',
            'jpg'   => 'image/jpeg',
            'png'   => 'image/png',
            'tiff'  => 'image/tiff',
            'tif'   => 'image/tiff',
            'eml'   => 'message/rfc822',
            'css'   => 'text/css',
            'html'  => 'text/html',
            'htm'   => 'text/html',
            'shtml' => 'text/html',
            'log'   => 'text/plain',
            'text'  => 'text/plain',
            'txt'   => 'text/plain',
            'rtx'   => 'text/richtext',
            'rtf'   => 'text/rtf',
            'vcf'   => 'text/vcard',
            'vcard' => 'text/vcard',
            'xml'   => 'text/xml',
            'xsl'   => 'text/xml',
            'mpeg'  => 'video/mpeg',
            'mpe'   => 'video/mpeg',
            'mpg'   => 'video/mpeg',
            'mov'   => 'video/quicktime',
            'qt'    => 'video/quicktime',
            'rv'    => 'video/vnd.rn-realvideo',
            'avi'   => 'video/x-msvideo',
            'movie' => 'video/x-sgi-movie'
        );
        if (array_key_exists(strtolower($ext), $mimes)) {
            return $mimes[strtolower($ext)];
        }
        return 'application/octet-stream';
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
    }

    /**
     * Map a file name to a MIME type.
     * Defaults to 'application/octet-stream', i.e.. arbitrary binary data.
     * @param string $filename A file name or full path, does not need to exist as a file
     * @return string
     * @static
     */
    public static function filenameToType($filename)
    {
<<<<<<< HEAD
        //In case the path is a URL, strip any query string before getting extension
        $qpos = strpos($filename, '?');
        if ($qpos !== false) {
=======
        // In case the path is a URL, strip any query string before getting extension
        $qpos = strpos($filename, '?');
        if (false !== $qpos) {
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            $filename = substr($filename, 0, $qpos);
        }
        $pathinfo = self::mb_pathinfo($filename);
        return self::_mime_types($pathinfo['extension']);
    }

    /**
     * Multi-byte-safe pathinfo replacement.
     * Drop-in replacement for pathinfo(), but multibyte-safe, cross-platform-safe, old-version-safe.
     * Works similarly to the one in PHP >= 5.2.0
     * @link http://www.php.net/manual/en/function.pathinfo.php#107461
     * @param string $path A filename or path, does not need to exist as a file
     * @param integer|string $options Either a PATHINFO_* constant,
     *      or a string name to return only the specified piece, allows 'filename' to work on PHP < 5.2
     * @return string|array
     * @static
     */
    public static function mb_pathinfo($path, $options = null)
    {
        $ret = array('dirname' => '', 'basename' => '', 'extension' => '', 'filename' => '');
<<<<<<< HEAD
        $m = array();
        preg_match('%^(.*?)[\\\\/]*(([^/\\\\]*?)(\.([^\.\\\\/]+?)|))[\\\\/\.]*$%im', $path, $m);
        if (array_key_exists(1, $m)) {
            $ret['dirname'] = $m[1];
        }
        if (array_key_exists(2, $m)) {
            $ret['basename'] = $m[2];
        }
        if (array_key_exists(5, $m)) {
            $ret['extension'] = $m[5];
        }
        if (array_key_exists(3, $m)) {
            $ret['filename'] = $m[3];
=======
        $pathinfo = array();
        if (preg_match('%^(.*?)[\\\\/]*(([^/\\\\]*?)(\.([^\.\\\\/]+?)|))[\\\\/\.]*$%im', $path, $pathinfo)) {
            if (array_key_exists(1, $pathinfo)) {
                $ret['dirname'] = $pathinfo[1];
            }
            if (array_key_exists(2, $pathinfo)) {
                $ret['basename'] = $pathinfo[2];
            }
            if (array_key_exists(5, $pathinfo)) {
                $ret['extension'] = $pathinfo[5];
            }
            if (array_key_exists(3, $pathinfo)) {
                $ret['filename'] = $pathinfo[3];
            }
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
        }
        switch ($options) {
            case PATHINFO_DIRNAME:
            case 'dirname':
                return $ret['dirname'];
<<<<<<< HEAD
                break;
            case PATHINFO_BASENAME:
            case 'basename':
                return $ret['basename'];
                break;
            case PATHINFO_EXTENSION:
            case 'extension':
                return $ret['extension'];
                break;
            case PATHINFO_FILENAME:
            case 'filename':
                return $ret['filename'];
                break;
=======
            case PATHINFO_BASENAME:
            case 'basename':
                return $ret['basename'];
            case PATHINFO_EXTENSION:
            case 'extension':
                return $ret['extension'];
            case PATHINFO_FILENAME:
            case 'filename':
                return $ret['filename'];
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            default:
                return $ret;
        }
    }

    /**
     * Set or reset instance properties.
<<<<<<< HEAD
     *
     * Usage Example:
     * $page->set('X-Priority', '3');
     *
     * @access public
     * @param string $name
     * @param mixed $value
     * NOTE: will not work with arrays, there are no arrays to set/reset
     * @throws phpmailerException
     * @return bool
     * @todo Should this not be using __set() magic function?
     */
    public function set($name, $value = '')
    {
        try {
            if (isset($this->$name)) {
                $this->$name = $value;
            } else {
                throw new phpmailerException($this->lang('variable_set') . $name, self::STOP_CRITICAL);
            }
        } catch (Exception $e) {
            $this->setError($e->getMessage());
            if ($e->getCode() == self::STOP_CRITICAL) {
                return false;
            }
        }
        return true;
=======
     * You should avoid this function - it's more verbose, less efficient, more error-prone and
     * harder to debug than setting properties directly.
     * Usage Example:
     * `$mail->set('SMTPSecure', 'tls');`
     *   is the same as:
     * `$mail->SMTPSecure = 'tls';`
     * @access public
     * @param string $name The property name to set
     * @param mixed $value The value to set the property to
     * @return boolean
     * @TODO Should this not be using the __set() magic function?
     */
    public function set($name, $value = '')
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
            return true;
        } else {
            $this->setError($this->lang('variable_set') . $name);
            return false;
        }
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
    }

    /**
     * Strip newlines to prevent header injection.
     * @access public
     * @param string $str
     * @return string
     */
    public function secureHeader($str)
    {
        return trim(str_replace(array("\r", "\n"), '', $str));
    }

    /**
     * Normalize line breaks in a string.
     * Converts UNIX LF, Mac CR and Windows CRLF line breaks into a single line break format.
     * Defaults to CRLF (for message bodies) and preserves consecutive breaks.
     * @param string $text
     * @param string $breaktype What kind of line break to use, defaults to CRLF
     * @return string
     * @access public
     * @static
     */
    public static function normalizeBreaks($text, $breaktype = "\r\n")
    {
        return preg_replace('/(\r\n|\r|\n)/ms', $breaktype, $text);
    }


    /**
<<<<<<< HEAD
     * Set the private key file and password for S/MIME signing.
=======
     * Set the public and private key files and password for S/MIME signing.
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     * @access public
     * @param string $cert_filename
     * @param string $key_filename
     * @param string $key_pass Password for private key
<<<<<<< HEAD
     */
    public function sign($cert_filename, $key_filename, $key_pass)
=======
     * @param string $extracerts_filename Optional path to chain certificate
     */
    public function sign($cert_filename, $key_filename, $key_pass, $extracerts_filename = '')
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
    {
        $this->sign_cert_file = $cert_filename;
        $this->sign_key_file = $key_filename;
        $this->sign_key_pass = $key_pass;
<<<<<<< HEAD
=======
        $this->sign_extracerts_file = $extracerts_filename;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
    }

    /**
     * Quoted-Printable-encode a DKIM header.
     * @access public
     * @param string $txt
     * @return string
     */
    public function DKIM_QP($txt)
    {
        $line = '';
        for ($i = 0; $i < strlen($txt); $i++) {
            $ord = ord($txt[$i]);
            if (((0x21 <= $ord) && ($ord <= 0x3A)) || $ord == 0x3C || ((0x3E <= $ord) && ($ord <= 0x7E))) {
                $line .= $txt[$i];
            } else {
<<<<<<< HEAD
                $line .= "=" . sprintf("%02X", $ord);
=======
                $line .= '=' . sprintf('%02X', $ord);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            }
        }
        return $line;
    }

    /**
     * Generate a DKIM signature.
     * @access public
<<<<<<< HEAD
     * @param string $s Header
     * @throws phpmailerException
     * @return string
     */
    public function DKIM_Sign($s)
    {
        if (!defined('PKCS7_TEXT')) {
            if ($this->exceptions) {
                throw new phpmailerException($this->lang("signing") . ' OpenSSL extension missing.');
=======
     * @param string $signHeader
     * @throws phpmailerException
     * @return string
     */
    public function DKIM_Sign($signHeader)
    {
        if (!defined('PKCS7_TEXT')) {
            if ($this->exceptions) {
                throw new phpmailerException($this->lang('extension_missing') . 'openssl');
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            }
            return '';
        }
        $privKeyStr = file_get_contents($this->DKIM_private);
        if ($this->DKIM_passphrase != '') {
            $privKey = openssl_pkey_get_private($privKeyStr, $this->DKIM_passphrase);
        } else {
            $privKey = $privKeyStr;
        }
<<<<<<< HEAD
        if (openssl_sign($s, $signature, $privKey)) {
=======
        if (openssl_sign($signHeader, $signature, $privKey)) {
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            return base64_encode($signature);
        }
        return '';
    }

    /**
     * Generate a DKIM canonicalization header.
     * @access public
<<<<<<< HEAD
     * @param string $s Header
     * @return string
     */
    public function DKIM_HeaderC($s)
    {
        $s = preg_replace("/\r\n\s+/", " ", $s);
        $lines = explode("\r\n", $s);
        foreach ($lines as $key => $line) {
            list($heading, $value) = explode(":", $line, 2);
            $heading = strtolower($heading);
            $value = preg_replace("/\s+/", " ", $value); // Compress useless spaces
            $lines[$key] = $heading . ":" . trim($value); // Don't forget to remove WSP around the value
        }
        $s = implode("\r\n", $lines);
        return $s;
=======
     * @param string $signHeader Header
     * @return string
     */
    public function DKIM_HeaderC($signHeader)
    {
        $signHeader = preg_replace('/\r\n\s+/', ' ', $signHeader);
        $lines = explode("\r\n", $signHeader);
        foreach ($lines as $key => $line) {
            list($heading, $value) = explode(':', $line, 2);
            $heading = strtolower($heading);
            $value = preg_replace('/\s+/', ' ', $value); // Compress useless spaces
            $lines[$key] = $heading . ':' . trim($value); // Don't forget to remove WSP around the value
        }
        $signHeader = implode("\r\n", $lines);
        return $signHeader;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
    }

    /**
     * Generate a DKIM canonicalization body.
     * @access public
     * @param string $body Message Body
     * @return string
     */
    public function DKIM_BodyC($body)
    {
        if ($body == '') {
            return "\r\n";
        }
        // stabilize line endings
        $body = str_replace("\r\n", "\n", $body);
        $body = str_replace("\n", "\r\n", $body);
        // END stabilize line endings
        while (substr($body, strlen($body) - 4, 4) == "\r\n\r\n") {
            $body = substr($body, 0, strlen($body) - 2);
        }
        return $body;
    }

    /**
     * Create the DKIM header and body in a new message header.
     * @access public
     * @param string $headers_line Header lines
     * @param string $subject Subject
     * @param string $body Body
     * @return string
     */
    public function DKIM_Add($headers_line, $subject, $body)
    {
        $DKIMsignatureType = 'rsa-sha1'; // Signature & hash algorithms
        $DKIMcanonicalization = 'relaxed/simple'; // Canonicalization of header/body
        $DKIMquery = 'dns/txt'; // Query method
        $DKIMtime = time(); // Signature Timestamp = seconds since 00:00:00 - Jan 1, 1970 (UTC time zone)
        $subject_header = "Subject: $subject";
        $headers = explode($this->LE, $headers_line);
        $from_header = '';
        $to_header = '';
        $current = '';
        foreach ($headers as $header) {
            if (strpos($header, 'From:') === 0) {
                $from_header = $header;
                $current = 'from_header';
            } elseif (strpos($header, 'To:') === 0) {
                $to_header = $header;
                $current = 'to_header';
            } else {
<<<<<<< HEAD
                if ($current && strpos($header, ' =?') === 0) {
                    $current .= $header;
=======
                if (!empty($$current) && strpos($header, ' =?') === 0) {
                    $$current .= $header;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                } else {
                    $current = '';
                }
            }
        }
        $from = str_replace('|', '=7C', $this->DKIM_QP($from_header));
        $to = str_replace('|', '=7C', $this->DKIM_QP($to_header));
        $subject = str_replace(
            '|',
            '=7C',
            $this->DKIM_QP($subject_header)
        ); // Copied header fields (dkim-quoted-printable)
        $body = $this->DKIM_BodyC($body);
        $DKIMlen = strlen($body); // Length of body
<<<<<<< HEAD
        $DKIMb64 = base64_encode(pack("H*", sha1($body))); // Base64 of packed binary SHA-1 hash of body
        $ident = ($this->DKIM_identity == '') ? '' : " i=" . $this->DKIM_identity . ";";
        $dkimhdrs = "DKIM-Signature: v=1; a=" .
            $DKIMsignatureType . "; q=" .
            $DKIMquery . "; l=" .
            $DKIMlen . "; s=" .
            $this->DKIM_selector .
            ";\r\n" .
            "\tt=" . $DKIMtime . "; c=" . $DKIMcanonicalization . ";\r\n" .
            "\th=From:To:Subject;\r\n" .
            "\td=" . $this->DKIM_domain . ";" . $ident . "\r\n" .
=======
        $DKIMb64 = base64_encode(pack('H*', sha1($body))); // Base64 of packed binary SHA-1 hash of body
        if ('' == $this->DKIM_identity) {
            $ident = '';
        } else {
            $ident = ' i=' . $this->DKIM_identity . ';';
        }
        $dkimhdrs = 'DKIM-Signature: v=1; a=' .
            $DKIMsignatureType . '; q=' .
            $DKIMquery . '; l=' .
            $DKIMlen . '; s=' .
            $this->DKIM_selector .
            ";\r\n" .
            "\tt=" . $DKIMtime . '; c=' . $DKIMcanonicalization . ";\r\n" .
            "\th=From:To:Subject;\r\n" .
            "\td=" . $this->DKIM_domain . ';' . $ident . "\r\n" .
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
            "\tz=$from\r\n" .
            "\t|$to\r\n" .
            "\t|$subject;\r\n" .
            "\tbh=" . $DKIMb64 . ";\r\n" .
            "\tb=";
        $toSign = $this->DKIM_HeaderC(
            $from_header . "\r\n" . $to_header . "\r\n" . $subject_header . "\r\n" . $dkimhdrs
        );
        $signed = $this->DKIM_Sign($toSign);
        return $dkimhdrs . $signed . "\r\n";
    }

    /**
<<<<<<< HEAD
     * Perform a callback.
     * @param bool $isSent
     * @param string $to
     * @param string $cc
     * @param string $bcc
=======
     * Detect if a string contains a line longer than the maximum line length allowed.
     * @param string $str
     * @return boolean
     * @static
     */
    public static function hasLineLongerThanMax($str)
    {
        //+2 to include CRLF line break for a 1000 total
        return (boolean)preg_match('/^(.{'.(self::MAX_LINE_LENGTH + 2).',})/m', $str);
    }

    /**
     * Allows for public read access to 'to' property.
     * @access public
     * @return array
     */
    public function getToAddresses()
    {
        return $this->to;
    }

    /**
     * Allows for public read access to 'cc' property.
     * @access public
     * @return array
     */
    public function getCcAddresses()
    {
        return $this->cc;
    }

    /**
     * Allows for public read access to 'bcc' property.
     * @access public
     * @return array
     */
    public function getBccAddresses()
    {
        return $this->bcc;
    }

    /**
     * Allows for public read access to 'ReplyTo' property.
     * @access public
     * @return array
     */
    public function getReplyToAddresses()
    {
        return $this->ReplyTo;
    }

    /**
     * Allows for public read access to 'all_recipients' property.
     * @access public
     * @return array
     */
    public function getAllRecipientAddresses()
    {
        return $this->all_recipients;
    }

    /**
     * Perform a callback.
     * @param boolean $isSent
     * @param array $to
     * @param array $cc
     * @param array $bcc
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
     * @param string $subject
     * @param string $body
     * @param string $from
     */
<<<<<<< HEAD
    protected function doCallback($isSent, $to, $cc, $bcc, $subject, $body, $from = null)
=======
    protected function doCallback($isSent, $to, $cc, $bcc, $subject, $body, $from)
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
    {
        if (!empty($this->action_function) && is_callable($this->action_function)) {
            $params = array($isSent, $to, $cc, $bcc, $subject, $body, $from);
            call_user_func_array($this->action_function, $params);
        }
    }
}

/**
 * PHPMailer exception handler
 * @package PHPMailer
 */
class phpmailerException extends Exception
{
    /**
     * Prettify error message output
     * @return string
     */
    public function errorMessage()
    {
        $errorMsg = '<strong>' . $this->getMessage() . "</strong><br />\n";
        return $errorMsg;
    }
}
