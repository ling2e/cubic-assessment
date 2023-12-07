<?php

use function PHPSTORM_META\type;

$title = "Home | Number Collector";
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/_template.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/components/Record.php";

function content()
{

    // import conn
    include_once $_SERVER["DOCUMENT_ROOT"] . "/_conn.php";
    // import Components;
    require_once $_SERVER["DOCUMENT_ROOT"] . "/components/RecordDetails.php";


    $records = (new RecordsControllers())->getRecords();



?>
    <?= RecordDetails() ?>
    <section class="container mx-auto py-4 text-slate-100 font-bold my-8 px-2">
        <div id="header capitalize">
            <h1 class="text-2xl md:text-4xl">All Record</h1>
            <p class="text-slate-400 text-sm md:text-md">Only show Latest 50 Record</p>
        </div>
        <hr class="w-full border-2 mt-4 mb-2">
        <?php if (isset($records) && gettype($records) != 'string') : ?>
            <div id="records" class="flex flex-wrap">
                <!-- records -->
                <!-- records -->
                <!-- records -->
                <?php foreach ($records as $x => $record) : ?>
                    <div class="md:w-1/2 lg:w-1/3 w-full p-2">

                        <div class="record group w-full h-[80px] md:h-[150px] duration-200 rounded-md shadow-inner  cursor-pointer bg-slate-100/10 flex flex-nowrap justify-center items-center gap-2 text-slate-100 font-bold hover:bg-slate-100 hover:shadow-md active:bg-slate-100/70" data-recordDetails='<?= json_encode($record) ?>'>

                            <?php for ($i = 0; $i < 5 - strlen($record["transaction"]); $i++) : ?>
                                <span class="py-3 md:py-6 w-[40px] md:w-[60px] text-center text-2xl text-gray-700 bg-slate-200 rounded-md shadow-md block group-hover:text-white group-hover:bg-[#ae94ce] duration-300">0</span>
                            <?php endfor; ?>

                            <?php for ($i = 0; $i < strlen($record["transaction"]); $i++) : ?>
                                <span class="py-3 md:py-6 w-[40px] md:w-[60px] text-center text-2xl text-gray-700 bg-slate-200 rounded-md shadow-md block group-hover:text-white group-hover:bg-[#ae94ce] duration-300"><?= $record["transaction"][$i] ?></span>
                            <?php endfor; ?>
                        </div>

                    </div>
                <?php
                endforeach;
            elseif (gettype($records) == 'string') : ?>
                <p class="text-2xl text-center my-4 font-semibold"><?= $records ?></p>

            <?php else : ?>
                <p class="text-2xl text-center my-4 font-semibold">No Records Yet! Let collect some.</p>
                <?= Button([
                    "text" => "Lets Gooo!",
                    "href" => "/",
                ]) ?>
            <?php endif; ?>
            </div>
    </section>

    <script>
        document.addEventListener('click', (x) => {
            let ele = x.target
            // find the close parent with className record
            let trgt = ele.closest(".record");
            if (trgt == null) return;
            // decode JSON format
            let recordDetails = JSON.parse(trgt.getAttribute("data-recordDetails"))

            // fill 0 in front when transaction length not 5
            let transaction = new Array(5 - recordDetails["transaction"].length).fill(0).join("") + `${recordDetails["transaction"]}`;
            RecordDetails_Set(
                transaction,
                JSON.parse(recordDetails["ary_pick_from"])
            )
            RecordDetails_Open()
        })
    </script>
<?php }
