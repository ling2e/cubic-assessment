<?php
/*  Todo:
*   [*] Create the layout for show the random number.
*   [*] Create the button to collect the number per second.
*   [*] Create the function to generate the random number per second and let it show show on screen.
*   [ ]
*/


$title = "Home | Number Collector";
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/_template.php";


function content()
{
    // Components
    require_once $_SERVER["DOCUMENT_ROOT"] . "/components/Record.php";

?>
    <?= Record() ?>
    <section class="container mx-auto min-h-[100vh] grid place-items-center">
        <div>
            <!-- Number Box -->
            <!-- Number Box -->
            <!-- Number Box -->
            <div id="fdigit-number" class="text-gray-700 text-8xl font-bold flex flex-nowrap gap-1">
                <span class="mx-1 w-[85px] text-center overflow-hidden p-4 shadow-md bg-white rounded-md block"><?= rand(0, 9) ?></span>
                <span class="mx-1 w-[85px] text-center overflow-hidden p-4 shadow-md bg-white rounded-md block"><?= rand(0, 9) ?></span>
                <span class="mx-1 w-[85px] text-center overflow-hidden p-4 shadow-md bg-white rounded-md block"><?= rand(0, 9) ?></span>
                <span class="mx-1 w-[85px] text-center overflow-hidden p-4 shadow-md bg-white rounded-md block"><?= rand(0, 9) ?></span>
                <span class="mx-1 w-[85px] text-center overflow-hidden p-4 shadow-md bg-white rounded-md block"><?= rand(0, 9) ?></span>
            </div>
            <hr class="my-4 border-transparent" />

            <!-- Collect Button -->
            <?= Button([
                "text" => "Collect",
                "onClick" => "collectBtn()"
            ]) ?>
        </div>
    </section>

    <script>
        let initNumLength = 5;
        // set the min number and maximum number.
        let min = 1;
        let max = new Array(initNumLength).fill(9).join("");

        // define the target element
        let eleParent = document.getElementById("fdigit-number");
        let aryEleSpan = eleParent.querySelectorAll("span");

        // function for show number to screen.
        let displayNumber = (aryNumber = new Array(initNumLength)) => aryEleSpan.forEach((ele, i) => ele.innerHTML = aryNumber[i]);

        (() => {
            /*
                this will auto run when page is ready.
                function Generate random 5 digit number per second.
                -------------------------------------
           */

            // timer will refresh every second
            setInterval(async () => {
                // generate the random 5 digit number
                let digitNum = `${Math.floor(Math.random() * (max - min + 1)) + min}`
                // split the number become array.
                let aryNum = await digitNum.split("");
                // check the Number if not enough 10 thousand and add the 0 in front it.
                while (aryNum.length < initNumLength) aryNum.unshift("0");

                // function display the result on screen.
                displayNumber(aryNum)
            }, 1000)
        })()

        // variable to check user not spam the btn.
        let isBtnProgressing = false;

        let collectBtn = () => {
            // if the progress still running will end from end.
            if (isBtnProgressing) return
            isBtnProgressing = true;
            // for site bar record box
            collectedBox_isCollecting();

            /*
                Timer to collect the last number on screen per second.
                --------------------------------
            */
            let aryResult = [+aryEleSpan[aryEleSpan.length - 1].innerHTML];

            // timer to get the last number show on screen.
            let timer = setInterval(() => {
                let lastDigit = +aryEleSpan[aryEleSpan.length - 1].innerHTML;

                aryResult.push(lastDigit)
                if (aryResult.length >= initNumLength) {
                    clearInterval(timer);

                    // show the result into record bar;
                    collectedBox_showNumber(aryResult.join(""))
                    collectedBox_isCollecting();
                    console.log((aryResult.join("")));
                    isBtnProgressing = false;
                };
            }, 1000);
        }
    </script>
<?php
}
