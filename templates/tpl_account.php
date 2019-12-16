<?php
function draw_input_box($class, $type, $placeholder, $required){
    draw_input_min_box($class, $type, $placeholder, $required, null);
}

function draw_input_min_box($class, $type, $placeholder, $required, $min){
    draw_input_step_box($class, $type, $placeholder, $required, $min, null);
}

function draw_input_step_box($class, $type, $placeholder, $required, $min, $step){
?>
    <div class="<?=$class?>">
        <label for="<?=$class?>"><?=$placeholder?>:</label>
        <input name="<?=$class?>" type="<?=$type?>" placeholder="<?=$placeholder?>" 
        <?php if(is_int($min)){
        ?>
        value="<?=$min?>"
        min="<?=$min?>"
        <?php
        }
        if(is_numeric($step)){
        ?>
        step="<?=$step?>"
        <?php
        }
        if($required){ ?> 
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