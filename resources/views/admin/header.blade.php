<div class="header_box_position">
    <div class="header_box">
        <div class="dropdown">
            <a href="/logout">Выход</a>
            <a href="/">Главная</a>
            <a onclick="myFunction()" class="dropbtn">Управление&#9660;</button>
            <div id="myDropdown" class="dropdown-content">
                <a href="/admin/services">Редактор материала</a>
                <a href="/admin/orders">Обработка заявок @if($neworders) @if(count($neworders)>0)({{count($neworders)}} новых)@endif @endif</a>
                <a href="/admin/prices">Редактор цен</a>
            </div>
        </div>
        <div class="header_logo_admin"><a href="/"><h1>
            Language Education Club</h1><a>    
        </div>
    </div>
</div>

</header>