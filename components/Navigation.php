<?php
function Navigation()
{
    // REDIRECT_URI
    $className_active = "block uppercase tracking-[2rem] text-center  break-all rounded-r-md cursor-pointer py-2 w-[40px] pl-3 text-xl bg-[#ae94ce] text-white duration-200";
    $className_default = "block w-[30px] text-lg uppercase tracking-[2rem] text-center bg-white break-all rounded-r-md cursor-pointer hover:w-[40px] py-2 pl-2 hover:pl-3 hover:text-xl hover:bg-[#ae94ce] hover:text-white duration-200";

?>
    <nav class="fixed left-0 top-1/4 z-[100]">
        <ul class="flex flex-nowrap flex-col gap-1">
            <li>
                <a href="/" class="<?= in_array($_SERVER["REQUEST_URI"], ["/", "/index", "/index.php"]) ? "{$className_active}" : "{$className_default}" ?>">Home</a>
            </li>
            <li>
                <a href="/records" class="<?= in_array($_SERVER["REQUEST_URI"], ["/records", "/records.php"])  ? $className_active : $className_default ?>">records</a>
            </li>
        </ul>
    </nav>
<?php
}
