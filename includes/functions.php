<?php

    function alert($text)
    {
        ?>
            <style>
            .alert {
                width: 80%;height: auto;margin: 0 auto;border-radius: 8px;color: #b74942;margin-bottom: 10px;
            }

            .alert li {
                list-style-type: none;display: inline-block;
            }

            .alert .info {
                margin-left: 20px;
            }

            .alert .close_li {
                float: right;font-size: 15px;padding: 17px 9px 0 0;color: #fdc2c8;
            }

            .alert .close_li:hover {
                color: #b74942;
            }

            .alert-danger {
                background-color: #f2dede;border: 1px solid #f5c0c6;
            }
            </style>
        
        <div class='alert alert-danger'>
            <li><p class='info'><?php echo $text; ?></p></li>
            <li class='close_li' onclick="this.parentElement.style.display='none';"><i class='close fa fa-times'></i></li>
        </div>
        
        <?php
        
    }

    function escape($string)
    {
        global $connection;
        return mysqli_real_escape_string($connection,trim($string));
    }
        
?>