<?php 

function createInput($icon, $placeholder, $name, $value) {
    $input = "
    <div class=\"input-group mb-2\">
        <div class=\"input-group-prepend\">
            <div class=\"input-group-text bg-warning\">$icon</div>
        </div>
        <input type=\"text\" name='$name' value='$value' autocomplete=\"off\" class=\"form-control\" id=\"inlineFormInputGroup\" placeholder=\"$placeholder\">
    </div>
    ";
    echo $input;
}

function createButton($btnid, $styleclass, $text, $name, $attribute) {
    $button = "
    <button name='$name' '$attribute' class='$styleclass' id='$btnid'>'$text'</button>
    ";
    echo $button;
}
?>