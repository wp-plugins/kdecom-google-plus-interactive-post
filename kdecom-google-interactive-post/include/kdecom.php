<?php

/**
 * Description of kdecom
 *
 * @author Purvesh
 */
class Kdecom {

    public function content_filter($content) {


        $content .= '<script type="text/javascript">
            (function() {
                var po = document.createElement("script"); po.type = "text/javascript"; po.async = true;
                po.src = "https://apis.google.com/js/client:plusone.js";
                var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s);
            })();
        </script><p><button
  class="g-interactivepost"
  data-contenturl="' . get_permalink() . '"
  data-clientid="' . get_option('googleplus-client-id') . '"
  data-cookiepolicy="single_host_origin"
  data-prefilltext="' . get_the_title() . '"
  data-calltoactionlabel="'.get_option('call-to-action').'"
  data-calltoactionurl="' . get_permalink() . '"
  >' . get_option('button-label') . '
   
</button></p>';

        return $content;
    }

    public function add_global_options() {
        add_options_page('Google Plus Interactive Option', 'Google Plus Interactive Option', 'manage_options', 'google-plus-kdecom', array($this, 'interactive_custom_options'));
    }

    public function interactive_custom_options() {

        $labels = array("ACCEPT", "ACCEPT_GIFT", "ADD", "ADD_FRIEND", "ADD_ME", "ADD_TO_CALENDAR", "ADD_TO_CART", "ADD_TO_FAVORITES", "ADD_TO_QUEUE", "ADD_TO_WISH_LIST",
            "ANSWER", "ANSWER_QUIZ", "APPLY", "ASK", "ATTACK", "BEAT", "BID", "BOOK",
            "BOOKMARK", "BROWSE", "BUY", "CAPTURE", "CHALLENGE", "CHANGE", "CHALLENGE", "CHAT", "CHANGE", "CHECKIN", "COLLECT", "COMMENT", "COMPARE", "COMPLAIN", "CONFIRM", "CONNECT",
            "CONTRIBUTE", "COOK", "CREATE", "DEFEND", "DINE", "DISCOVER", "DISCUSS", "DONATE", "DOWNLOAD", "EARN", "EAT", "EXPLAIN", "FIND", "FIND_A_TABLE", "FOLLOW", "GET", "GIFT", "GIVE",
            "GO", "HELP", "IDENTIFY", "INSTALL", "INSTALL_APP", "INTRODUCE", "INVITE", "JOIN", "JOIN_ME", "LEARN", "LEARN_MORE", "LISTEN", "MAKE", "MATCH", "MESSAGE", "OPEN", "OPEN_APP",
            "OWN", "PAY", "PIN", "PIN_IT", "PLAN", "PLAY", "PURCHASE", "RATE", "READ", "READ_MORE", "RECOMMEND", "RECORD", "REDEEM", "REGISTER", "REPLY", "RESERVE", "REVIEW", "RSVP", "SAVE",
            "SAVE_OFFER", "SEE_DEMO", "SELL", "SEND", "SIGN_IN", "SIGN_UP", "START", "STOP", "SUBSCRIBE", "TAKE_QUIZ", "TAKE_TEST", "TRY_IT", "UPVOTE", "USE", "VIEW", "VIEW_ITEM", "VIEW_MENU",
            "VIEW_PROFILE", "VISIT", "VOTE", "WANT", "WANT_TO_SEE", "WANT_TO_SEE_IT", "WATCH", "WATCH_TRAILER", "WISH", "WRITE");
        ?>  
        
        <div class="wrap">  
            <h2>Kdecom Google Interactive Post Options</h2>  
            <form method="post" action="options.php">  
        <?php wp_nonce_field('update-options') ?>  
                <p><strong>Google PLus Client ID:</strong><br />  
                    <input type="text" name="googleplus-client-id" size="45" value="<?php echo get_option('googleplus-client-id'); ?>" />  
                </p>  
                <p><strong>Call to Action Label:</strong><br />  
                    <select name="call-to-action">
        <?php
        $calltoAction = (get_option("call-to-action") != "") ? get_option("call-to-action") : "OPEN";
        foreach ($labels as $label) {
            $selected = ($calltoAction == $label) ? "selected" : "";
            echo "<option $selected >$label</option>";
        }
        ?>
                    </select>
                </p>  
                <p><strong>Button Label:</strong><br />  
                    <input type="text" name="button-label" size="45" value="<?php echo get_option('button-label'); ?>" />  
                </p>  
                <p><input type="submit" name="Submit" value="Store Options" /></p>  
                <input type="hidden" name="action" value="update" />  
                <input type="hidden" name="page_options" value="googleplus-client-id,button-label,call-to-action" />  
            </form>  
        </div>  
        <?php
    }

}
?>
