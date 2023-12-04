<?php
/*  Todo:
*   [*] Create the box for record.
*   [*] Show the view for no record yet.
*   [ ] Show the lucky number after player collect the number.
*/
function Record($digitNum = 5)
{
?>
    <!-- button open your record , only show when small screen -->
    <button class="md:hidden bg-white h-[60px] w-[60px] rounded-full shadow-md fixed bottom-0 right-0 m-4 active:bg-[#fb8a8ac5] duration-200 "></button>

    <!-- your record box , need toggle to open it when small screen -->
    <section id="recordBox" class="hidden md:grid fixed top-1/2 right-0 -translate-y-1/2 m-2 bg-white rounded-md p-4 text-gray-500  duration-200 min-h-[100px] w-[350px] place-items-center shadow-md">
        <!-- Will show when no record yet. -->
        <p id="recordBox-noResult" class=" w-full text-center font-semibold"> let try collect some luck number</p>

        <p id="recordBox-collecting" class="hidden w-full text-center font-semibold ">Collecting ...</p>

        <div id="collected-box" class="flex flex-nowrap font-semibold text-center text-white text-xl mt-2">

            <!-- collected number box -->
            <?php for ($i = 1; $i <= $digitNum; $i++) : ?>
                <span class="collected-box-items<?= $i ?> mx-1 w-[30px] overflow-hidden py-3 px-2 shadow-inner bg-[#ae94ce] rounded-md block">0</span>
            <?php endfor; ?>

        </div>

    </section>

    <script>
        let collectedBox = document.getElementById("collected-box");
        let collectedItemsBox = collectedBox.querySelectorAll("span")

        let collectedBox_isCollecting = () => {
            // will hide after player starting collect the lucky number
            if (![...document.getElementById('recordBox-noResult').classList].includes("hidden")) document.getElementById('recordBox-noResult').classList.add("hidden");

            // for show the is collecting...
            document.getElementById('recordBox-collecting').classList.toggle("hidden")
        }

        let collectedBox_showNumber = (result = new Array(<?= $digitNum ?>).fill(9), cusIndex = -1) => {
            if (cusIndex != -1) {
                collectedItemsBox[cusIndex].innerHTML = result
                return
            }

            [...collectedItemsBox].forEach((ele, i) => {
                ele.innerHTML = result[i]
            })
        }
        let collectedBox_reset = () => {
            [...collectedItemsBox].forEach((ele, i) => {
                ele.innerHTML = +0
            })
        }
    </script>
<?php
}
