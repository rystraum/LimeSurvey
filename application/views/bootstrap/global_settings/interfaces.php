<ul>
                <?php $RPCInterface=getGlobalSetting('RPCInterface'); ?>
                <li><label for='RPCInterface'><?php $clang->eT("RPC interface enabled:"); ?></label>
                    <select id='RPCInterface' name='RPCInterface'>
                        <option value='off'
                            <?php if ($RPCInterface == 'off') { echo " selected='selected'";}?>
                            ><?php $clang->eT("Off"); ?></option>
                        <option value='json'
                            <?php if ($RPCInterface == 'json') { echo " selected='selected'";}?>
                            ><?php $clang->eT("JSON-RPC"); ?></option>
                        <option value='xml'
                            <?php if ($RPCInterface == 'xml') { echo " selected='selected'";}?>
                            ><?php $clang->eT("XML-RPC"); ?></option>
                    </select></li>
                    <li><label><?php $clang->eT("URL:"); ?></label><?php echo $this->createAbsoluteUrl("admin/remotecontrol"); ?></li>
            </ul>