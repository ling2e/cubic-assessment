<?php
/*  Todo:
*   [*] Create the box for record.
*   [*] Show the view for no record yet.
*   [ ] Show the lucky number after player collect the number.
*/
function Record($props = [
    "digitNum" => 5,
    "onClick" => ""
])
{
    if(!array_key_exists('digitNum', $props)) $props["digitNum"] = 5;

    $cursor = (array_key_exists('onClick', $props) && $props['onClick'] != "") ? "cursor-pointer" : "cursor-default" ;
?>
    <!-- button open your record , only show when small screen -->
    <button class="md:hidden bg-white h-[60px] w-[60px] rounded-full shadow-md fixed z-[50] bottom-0 right-0 m-4 active:bg-[#fb8a8ac5] duration-200 "></button>

    <!-- your record box , need toggle to open it when small screen -->
    <section id="recordBox" class="hidden md:grid fixed top-1/2 right-0 -translate-y-1/2 m-2 bg-white rounded-md p-4 text-gray-500  duration-200 min-h-[100px] w-[350px] place-items-center shadow-md <?= $cursor ?>" onClick="<?= $props["onClick"] ?>">
        <!-- Will show when no record yet. -->
        <p id="recordBox-text" class=" w-full text-center font-semibold" data-isCollecting="false">Let try collect some luck number</p>

        <div id="record-box" class="flex flex-nowrap font-semibold text-center text-white text-xl mt-2">
            <!-- record number box -->
            <?php for ($i = 1; $i <= $props['digitNum']; $i++) : ?>
                <span class="record-box-items<?= $i ?> mx-1 w-[30px] overflow-hidden py-3 text-center shadow-inner bg-[#ae94ce] rounded-md block">0</span>
            <?php endfor; ?> 

        </div>

    </section>

    <script>
        let recordBox = document.getElementById("record-box");
        let recordItemsBox = recordBox.querySelectorAll("span")


        let Record_isCollecting = () => {
            let recordTxt = document.getElementById("recordBox-text");

            if (recordTxt.getAttribute("data-isCollecting") == "false") {
                recordTxt.innerHTML = "Collecting ..."
                recordTxt.setAttribute("data-isCollecting", true)
            } else {
                recordTxt.innerHTML = "Here is your lucky number."
                recordTxt.setAttribute("data-isCollecting", false)
            }
        }

        let Record_showNumber = (result = new Array(<?= $props['digitNum'] ?>).fill(9), cusIndex = -1) => {
            if (cusIndex != -1) {
                recordItemsBox[cusIndex].innerHTML = result
                return
            }

            [...recordItemsBox].forEach((ele, i) => {
                ele.innerHTML = result[i]
            })
        }
        let Record_reset = () => {
            [...recordItemsBox].forEach((ele, i) => {
                ele.innerHTML = +0
            })
        }
    </script>
<?php
}
