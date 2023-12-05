<?php
function RecordDetails()
{ ?>
    <div id="record-details" class="fixed w-screen h-screen backdrop-blur z-[999] grid place-items-center hidden" data-isOpen="false" data-recordDetails="">
        <div id="recordDetails-box" class="fixed bg-slate-100 rounded-md shadow-md min-w-[90vw] md:min-w-[500px] min-h-[30vh] md:min-h-[300px] p-4">
            <!-- header -->
            <!-- header -->
            <!-- header -->
            <div id="recordDetails-box_header" class="flex flex-nowrap justify-between items-end">
                <h4 class="h-min capitalize text-2xl font-bold">Record Details</h4>
                <button id="recordDetails-btnClose" class="text-white bg-red-500 hover:bg-red-600 active:opacity-80 p-2 px-4 font-semibold rounded">x</button>
            </div>
            <hr class="mt-4 mb-2 w-full border-2">
            <!-- items -->
            <!-- items -->
            <!-- items -->
            <?php for ($x = 1; $x <= 5; $x++) : ?>
                <div class="recordDetails-itemBox w-full py-2 px-4 flex flex-nowrap justify-between items-center shadow hover:bg-slate-300 duration-300 rounded-sm">
                    <div id="recordDetails-items" class="w-10/12 flex flex-nowrap gap-2 justify-center text-white font-bold">
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <span class=" overflow-hidden py-3 min-w-[40px] text-center text-xl <?= $i != 5 ? "shadow-inner opacity-80" : "shadow-sm" ?> bg-[#ae94ce] rounded-md block">0</span>
                        <?php endfor; ?>

                    </div>

                    <p class="font-bold text-xl w-1/12"> = </p>
                    <p id="recordDetails-result" class="font-bold text-xl w-1/12">0</p>
                </div>
            <?php endfor; ?>

        </div>
    </div>
    <script>
        // function for open this model;
        document.getElementById("record-details").addEventListener("click", ele => {
            let trgt = document.getElementById("record-details")
            if (["record-details", "recordDetails-btnClose"].includes(ele.target.id)) {
                trgt.setAttribute("data-isOpen", 'false');
                trgt.classList.add("hidden")
            }
        })

        // function for open this model;
        let RecordDetails_Open = () => {
            let trgt = document.getElementById("record-details");
            RecordDetails_Show()

            trgt.setAttribute("data-isOpen", 'true');
            [...trgt.classList].includes('hidden') && trgt.classList.remove("hidden");
        }

        // function for set the lucky number Details.
        let RecordDetails_Set = (
            result = "00000",
            aryOri = [
                new Array(5).fill("0"),
                new Array(5).fill("0"),
                new Array(5).fill("0"),
                new Array(5).fill("0"),
                new Array(5).fill("0"),
            ]) => document.getElementById("record-details").setAttribute("data-recordDetails", JSON.stringify({
            result,
            ori: aryOri
        }))
        RecordDetails_Set();

        // function for show the lucky number Details.
        let RecordDetails_Show = () => {
            let objData = JSON.parse(document.getElementById("record-details").getAttribute("data-recordDetails"));
            let aryResult = objData.result.split("")
            let aryResultOri = objData.ori

            let displayBox = document.querySelectorAll(".recordDetails-itemBox");

            [...displayBox].forEach((ele, i) => {
                ele.querySelector("#recordDetails-result").innerHTML = aryResult[i];
                [...ele.querySelector("#recordDetails-items").querySelectorAll("span")].forEach((eleSpan, iSpan) => {
                    eleSpan.innerHTML = aryResultOri[i][iSpan][0];
                })
            })

        }
    </script>
<?php }
