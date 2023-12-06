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
    if (!array_key_exists('digitNum', $props)) $props["digitNum"] = 5;

    $cursor = (array_key_exists('onClick', $props) && $props['onClick'] != "") ? "cursor-pointer" : "cursor-default";
?>

    <section id="recordBox" class="grid fixed bottom-5 right-1/2 translate-x-1/2 md:bottom-1/2 md:right-0 md:-translate-x-0 md:-translate-y-1/2 m-2 bg-white rounded-md p-4 text-gray-500  duration-200 min-h-[80px] md:min-h-[100px] w-[70vw] md:w-[350px] place-items-center shadow-md <?= $cursor ?>" onClick="<?= $props["onClick"] ?>">
        <!-- Will show when no record yet. -->
        <p id="recordBox-text" class=" w-full text-center font-semibold text-sm md:text-auto" data-isCollecting="false">Let try collect some luck number</p>

        <div id="record-box" class="flex flex-nowrap font-semibold text-center text-white text-xl mt-2">
            <!-- record number box -->
            <?php for ($i = 1; $i <= $props['digitNum']; $i++) : ?>
                <span class="record-box-items<?= $i ?> mx-1 w-[25px] md:w-[30px] overflow-hidden py-2 md:py-3 text-center shadow-inner bg-[#ae94ce] rounded-md block">0</span>
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
