<?php
function Navigation()
{
    // REDIRECT_URI
    $className_active = "block uppercase md:tracking-[2rem] px-4 md:p-none text-center  break-all rounded-b-md md:rounded-b-none md:rounded-r-md cursor-pointer py-1 md:py-2 flex-1 md:flex-none md:w-[40px] pl-3 text-md md:text-lg bg-[#ae94ce] text-white duration-200";
    
    $className_default = "block md:w-[30px] px-4 md:p-none text-lg uppercase md:tracking-[2rem] text-sm md:text-lg text-center bg-white break-all rounded-b-md md:rounded-b-none md:rounded-r-md cursor-pointer md:hover:w-[40px] py-1 md:py-2  md:flex-none md:pl-2 md:hover:pl-3 md:hover:text-xl md:hover:bg-[#ae94ce] md:hover:text-white duration-200";

?>
    <nav class="fixed left-0 top-0 md:top-1/4 z-[100] w-full md:w-auto">
        <ul class="flex flex-nowrap md:flex-col gap-1 px-2 md:px-0">
            <li class="flex-1">
                <a href="/" class="<?= in_array($_SERVER["REQUEST_URI"], ["/", "/index", "/index.php"]) ? "{$className_active}" : "{$className_default}" ?>">Home</a>
            </li>
            <li class="flex-1">
                <a href="/records" class="<?= in_array($_SERVER["REQUEST_URI"], ["/records", "/records.php"])  ? $className_active : $className_default ?>">records</a>
            </li>
        </ul>
    </nav>
<?php
}
