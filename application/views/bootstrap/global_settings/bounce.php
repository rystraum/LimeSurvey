<ul>
  <li>
    <label for='siteadminbounce'><?php $clang->eT("Default site bounce email:"); ?></label>
    <input type='text' size='50' id='siteadminbounce' name='siteadminbounce' value="<?php echo htmlspecialchars(getGlobalSetting('siteadminbounce')); ?>" />
  </li>
  <li>
    <label for='bounceaccounttype'><?php $clang->eT("Server type:"); ?></label>
    <select id='bounceaccounttype' name='bounceaccounttype'>
      <option value='off' <?php if (getGlobalSetting('bounceaccounttype')=='off') {echo " selected='selected'";}?>>
        <?php $clang->eT("Off"); ?>
      </option>
      <option value='IMAP' <?php if (getGlobalSetting('bounceaccounttype')=='IMAP') {echo " selected='selected'";}?>>
        <?php $clang->eT("IMAP"); ?>
      </option>
      <option value='POP' <?php if (getGlobalSetting('bounceaccounttype')=='POP') {echo " selected='selected'";}?>>
        <?php $clang->eT("POP"); ?>
      </option>
    </select>
  </li>
  <li>
    <label for='bounceaccounthost'><?php $clang->eT("Server name & port:"); ?></label>
    <input type='text' size='50' id='bounceaccounthost' name='bounceaccounthost' value="<?php echo htmlspecialchars(getGlobalSetting('bounceaccounthost'))?>" /> <span class='hint'><?php $clang->eT("Enter your hostname and port, e.g.: imap.gmail.com:995"); ?></span>
  </li>
  <li>
    <label for='bounceaccountuser'><?php $clang->eT("User name:"); ?></label>
    <input type='text' size='50' id='bounceaccountuser' name='bounceaccountuser' 
    value="<?php echo htmlspecialchars(getGlobalSetting('bounceaccountuser'))?>" />
  </li>
  <li>
    <label for='bounceaccountpass'><?php $clang->eT("Password:"); ?></label>
    <input type='password' size='50' id='bounceaccountpass' name='bounceaccountpass' value='enteredpassword' /></li>
  <li>
    <label for='bounceencryption'><?php $clang->eT("Encryption type:"); ?></label>
    <select id='bounceencryption' name='bounceencryption'>
      <option value='off' <?php if (getGlobalSetting('bounceencryption')=='off') {echo " selected='selected'";}?>>
        <?php $clang->eT("Off"); ?>
      </option>
      <option value='SSL' <?php if (getGlobalSetting('bounceencryption')=='SSL') {echo " selected='selected'";}?>>
        <?php $clang->eT("SSL"); ?>
      </option>
      <option value='TLS' <?php if (getGlobalSetting('bounceencryption')=='TLS') {echo " selected='selected'";}?>>
        <?php $clang->eT("TLS"); ?>
      </option>
    </select>
  </li>
</ul>