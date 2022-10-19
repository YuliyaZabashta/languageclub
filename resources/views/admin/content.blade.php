   <main class="page">
        <div class="container">
            <div class="content">
                @if($neworders)
                <a href="admin/orders/">
                    <div class="admin-services-block">
                        <p>Заявки</p>
                        @if($neworders) @if(count($neworders)>0)
                        <p>Новых заявок - {{count($neworders)}} </p>
                        @endif @endif
                    </div>
                </a>
                @endif
                <a href="admin/services/">
                    <div class="admin-services-block">
                        <p>Редактор контента</p>
                    </div>
                </a>
                <a href="admin/prices">
                    <div class="admin-services-block">
                        <p>Редактор цен</p>
                    </div>
                </a>
            </div>
        </div>    
    </main>