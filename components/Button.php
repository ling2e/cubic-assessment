<?php
function Button($objDetails = [
    "id" => "",
    "text" => "asd",
    "href" => "",
    "onClick" => ""
])
{
    $href = "";
    $OnClick = "";
    
    // check if user provide specify id.
    $attrId = "";
    if(array_key_exists('id', $objDetails)) $attrId = "id=\"{$objDetails["id"]}\"";

    // if Statement , if href | onClick have value will return their layout
    if (array_key_exists('href', $objDetails) && $objDetails["href"] != "") {
        $href = "<a href=\"{$objDetails["href"]}\">";
    }
    if (array_key_exists('onClick', $objDetails) && $objDetails["onClick"] != "") {
        $OnClick = "onClick=\"" . $objDetails["onClick"] . "\"";
    }

    // Return Layout;
    // Return Layout;
    // Return Layout;
?>
    <?= $href ?>
    <button <?= $attrId ?> class="btn mx-auto block md:w-100 w-min text-md whitespace-nowrap" <?= $OnClick ?>><?= $objDetails["text"] ?></button>
    <?php if ($href != "") echo "</a>" ?>
<?php
}
