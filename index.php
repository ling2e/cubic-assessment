<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/_template.php";
function content()
{ ?>
    <div class="container mx-auto min-h-[100vh] grid place-items-center select-none">
        <div>
            <div id="fdigit-number" class="text-gray-700 text-8xl font-bold flex flex-nowrap gap-1">
                <span class="mx-1 p-4 shadow-md bg-white rounded-md block">0</span>
                <span class="mx-1 p-4 shadow-md bg-white rounded-md block">0</span>
                <span class="mx-1 p-4 shadow-md bg-white rounded-md block">0</span>
                <span class="mx-1 p-4 shadow-md bg-white rounded-md block">0</span>
                <span class="mx-1 p-4 shadow-md bg-white rounded-md block">0</span>
            </div>
            <hr class="my-4 border-transparent" />
            <button class="btn mx-auto block">Collect</button>
        </div>
    </div>
<?php
}
