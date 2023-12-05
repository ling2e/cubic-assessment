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
    require_once $_SERVER["DOCUMENT_ROOT"] . "/components/RecordDetails.php";

?>
    <nav></nav>
    <?= Record([
        "onClick" => "RecordDetails_Open()"
    ]) ?>
    <?= RecordDetails() ?>
    <section class="container mx-auto min-h-[100vh] grid place-items-center">
        <div>
            <!-- Number Box -->
            <!-- Number Box -->
            <!-- Number Box -->
            <div id="fdigit-number" class="text-gray-700 text-8xl font-bold flex flex-nowrap gap-1">

                <?php for ($i = 0; $i < 5; $i++) : ?>
                    <span class="mx-1 w-[85px] text-center overflow-hidden p-4 shadow-md bg-white rounded-md block"><?= rand(0, 9) ?></span>
                <?php endfor; ?>

            </div>
            <hr class="my-4 border-transparent" />

            <!-- Collect Button -->
            <?= Button([
                "id" => "collect-btn",
                "text" => "Collect",
                "onClick" => "collectBtn()",
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


        // for check player is spam the btn or not.
        let isBtnProgressing = false;
        let collectBtn = () => {

            // if the progress still running will end from end.
            if (isBtnProgressing) return
            isBtnProgressing = true;
            // for site bar record box && reset the record box
            Record_isCollecting()
            Record_reset()

            // disable button
            let collectBtn = document.getElementById("collect-btn")
            collectBtn.disabled = isBtnProgressing;
            collectBtn.innerHTML = "Collecting ..."

            /*
                Timer to collect the last number on screen per second.
                --------------------------------
            */
            //    initialize and store the first number instant
            let _firstNum = +aryEleSpan[aryEleSpan.length - 1].innerHTML;
            let aryResult = [_firstNum];
            Record_showNumber(_firstNum, aryResult.length - 1)

            // get the original 5 digit number from.
            let aryOriResult = [
                [...aryEleSpan].map(ele => ele.innerHTML).join("")
            ]

            // timer to get the last number show on screen.
            let timer = setInterval(() => {
                aryOriResult.push([...aryEleSpan].map(ele => ele.innerHTML).join(""))
                let lastDigit = +aryEleSpan[aryEleSpan.length - 1].innerHTML;

                aryResult.push(lastDigit)
                // show the result into record bar;
                Record_showNumber(lastDigit, aryResult.length - 1)

                if (aryResult.length >= initNumLength) {
                    clearInterval(timer);
                    Record_isCollecting();
                    isBtnProgressing = false;

                    collectBtn.disabled = isBtnProgressing;
                    collectBtn.innerHTML = "Collect";
                    
                    // passing value to record Details models
                    RecordDetails_Set(aryResult.join(""), aryOriResult)
                };
            }, 1000);
        }


        // Setup
        // Setup
        // Setup
        (() => {
            /*
                this will auto run when page is ready.
                function Generate random 5 digit number per second.
                -------------------------------------
           */

            // timer will refresh every second
            setInterval(async () => {
                // generate the random 5 digit number
                let digitNum = `${Math.floor(Math.random() * (max - min + 1)) + min}`;
                // split the number become array.
                let aryNum = await digitNum.split("");
                // check the Number if not enough 10 thousand and add the 0 in front it.
                while (aryNum.length < initNumLength) aryNum.unshift("0");

                // function display the result on screen.
                displayNumber(aryNum)
            }, 1000)
        })()
    </script>
<?php
}
