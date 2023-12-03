<?php
function Button($objDetails = [
    "text" => "asd",
    "href" => "",
    "onClick" => ""
])
{
    $href = "";
    $OnClick = "";
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
    <button class="btn mx-auto block" <?= $OnClick ?>><?= $objDetails["text"] ?></button>
    <?php if ($href != "") echo "</a>" ?>
<?php
}
