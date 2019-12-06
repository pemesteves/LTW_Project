<?php
function draw_input_box($class, $type, $placeholder, $required){
?>
    <div class="<?=$class?>">
        <label for="<?=$class?>"><?=$placeholder?>:</label>
        <input name="<?=$class?>" type="<?=$type?>" placeholder="<?=$placeholder?>" 
        <?php if($required){ ?> 
            required 
        <?php } ?>
        />
    </div>
<?php
}

function draw_account_submit($current, $next, $text){
?>
    <input class="account_button" type="Submit" value="<?=$current?>"> 
    <div class="link_to">
        <p><?=$text?> <a href="<?=$next?>.php">here</a></p> 
    </div>
<?php
}
?>