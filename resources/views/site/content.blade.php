   <main class="page">
        <div class="container">
            <div class="content">
                <section class="block3">
                    <div class="block5"><img src="images/logo.png" width="250px" height="250"></div>
                    <div class="block4">Образовательный<br> центр иностранных <br>языков</div>
                    <section class="section_menu" id="services">
                        <section class="block _anim-items _anim-no-hide">
                            <a href="/service#schoolchildren">
                                <div class="promo">
                                    <div class="promoimg">
                                        <img src="images/kids.png">
                                        <p>Для школьников</p>
                                        <div class="promohover">Узнать больше</div>
                                    </div>
                                </div>
                            </a>
                        </section>
                        <section class="block1 _anim-items _anim-no-hide">
                            <a href="/service#graduates">
                                <div class="promo">
                                    <div class="promoimg">
                                        <img src="images/teenager.png">
                                        <p>Для выпускников</p>
                                        <div class="promohover">Узнать больше</div>
                                    </div>
                                </div>
                            </a>
                        </section>
                        <section class="block _anim-items _anim-no-hide">
                            <a href="/service#adults">
                                <div class="promo">
                                    <div class="promoimg">
                                        <img src="images/adult.png">
                                        <p>Для взрослых</p>
                                        <div class="promohover">Узнать больше</div>
                                    </div>
                                </div>
                            </a>
                        </section>
                        <section class="block1 _anim-items _anim-no-hide">
                            <a href="/service#overseasstudy">
                                <div class="promo">
                                    <div class="promoimg">
                                        <img src="images/learning.png">
                                        <p>Обучение за рубежом</p>
                                        <div class="promohover">Узнать больше</div>
                                    </div>
                                </div>
                            </a>
                        </section>
                        <section class="block _anim-items _anim-no-hide">
                            <a href="/service#exampreparation">
                                <div class="promo">
                                    <div class="promoimg">
                                        <img src="images/exam.png">
                                        <p>Подготовка к экзаменам</p>
                                        <div class="promohover">Узнать больше</div>
                                    </div>
                                </div>
                            </a>
                        </section>
                        <section class="block1 _anim-items _anim-no-hide">
                            <a href="/service#conversationclub">
                                <div class="promo">
                                    <div class="promoimg">
                                        <img src="images/talk.png">
                                        <p>Разговорный клуб</p>
                                        <div class="promohover">Узнать больше</div>
                                    </div>
                                </div>
                            </a>
                        </section>
                    </section>
                </section>
                <section class="section_menu" id="contacts">
                    <div class="feedback">
                        @if(session('status'))
                        <div style="color: #528E0F;">
                            <p>{{ session('status')}}</p>
                        </div> 
                        @endif
                        @if(count($errors)>0)
                        <div style="color: #F20000; font-size:20px; margin-top:-10px; margin-bottom:-15px;">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div> 
                        @endif
                        <h3>Оставьте заявку</h3>
                        <p>Наш администратор свяжется с Вами в ближайшее время</p>
                        <form action="{{route('home')}}" method="post">
                        <input type="text" class="feedbackinput" name="name" value="{{ old('name') }}" placeholder="Ваше имя">
                        <input type="tel"  class="feedbackinput" name="telephone" value="{{ old('telephone') }}" placeholder="+7 (999) 999-99-99" minlength="11" maxlength="12" data-phonemask-without-code="(999) 999-99-99">
                        <input type="submit" class="btn-success" value="Отправить">
                        {{ csrf_field() }}
                        </form>
                    </div>
                    <div class="feedback">
                        <img src="images/feebback.png">
                    </div>
                </section>
            </div>
        </div>    
    </main>