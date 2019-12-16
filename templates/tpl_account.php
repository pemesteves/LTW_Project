<?php
function draw_input_box($class, $type, $placeholder, $required){
    draw_input_min_box($class, $type, $placeholder, $required, null);
}

function draw_input_min_box($class, $type, $placeholder, $required, $min){
    draw_input_step_box($class, $type, $placeholder, $required, $min, null);
}

function draw_input_step_box($class, $type, $placeholder, $required, $min, $step){
    draw_input_label_box($class, $type, $placeholder, $placeholder, $required, $min, $min, null, $step);
}

function draw_input_label_box($class, $type, $label, $placeholder, $required, $value, $min, $max, $step){
?>
    <div class="<?=$class?>">
        <label for="<?=$class?>"><?=$label?>:</label>
        <input name="<?=$class?>" type="<?=$type?>" 
        <?php if(!is_null($placeholder)){
        ?>
        placeholder="<?=$placeholder?>" 
        <?php 
        } 
        if(!is_null($value)){
        ?>
        value="<?=$value?>"
        <?php
        }
        if(!is_null($min)){
        ?>
        min="<?=$min?>"
        <?php
        }
        if(!is_null($max)){
        ?>
        max="<?=$max?>"
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

function draw_input_id($id, $type, $name, $value, $placeholder, $required){
?>
    <input 
    <?php if(!is_null($id)){
    ?>
    id="<?=$id?>"
    <?php
    }
    ?>
    type="<?=$type?>" name="<?=$name?>" value="<?=$value?>" placeholder="<?=$placeholder?>"
    <?php if($required){
    ?>
    required
    <?php
    }
    ?>
    />
<?php
}

function draw_input($type, $name, $value, $placeholder, $required){
    draw_input_id(null, $type, $name, $value, $placeholder, $required);
}
?>