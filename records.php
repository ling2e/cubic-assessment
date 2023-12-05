<?php
$title = "Home | Number Collector";
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/_template.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/components/Record.php";

function content()
{
    // import Components;
    require_once $_SERVER["DOCUMENT_ROOT"] . "/components/RecordDetails.php";

?>

    <?= RecordDetails() ?>
    <section class="container mx-auto py-4 text-slate-100 font-bold">
        <div id="header capitalize">
            <h1 class="text-4xl">All Record</h1>
            <p class="text-slate-400 text-md">Only show Latest 50 Record</p>
        </div>
        <hr class="w-full border-2 mt-4 mb-2">

        <div id="records" class="flex flex-wrap">
            <!-- records -->
            <!-- records -->
            <!-- records -->
            <?php for ($x = 1; $x <= rand(6,20); $x++) : ?>

                <div class="md:w-1/2 lg:w-1/3 w-full p-2">
                    <div class="record group w-full h-[150px] duration-200 rounded-md shadow-inner  cursor-pointer bg-slate-100/10 flex flex-nowrap justify-center items-center gap-2 text-slate-100 font-bold hover:bg-slate-100 hover:shadow-md active:bg-slate-100/70" data-recordDetails="">
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <span class="py-6 min-w-[60px] text-center text-2xl text-gray-700 bg-slate-200 rounded-md shadow-md block group-hover:text-white group-hover:bg-[#ae94ce] duration-300"><?= rand(0, 9) ?></span>
                        <?php endfor; ?>
                    </div>
                </div>

            <?php endfor; ?>

        </div>
    </section>
<?php }
