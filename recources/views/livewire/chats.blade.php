<div>

<!--
<html>
<header>
<link rel="stylesheet"  href="../assets/css/chat.css">

</header>
<!--It's just a concept, a chat UI design for direct messaging!
Enjoy! :) Don't forget to click the heart if you like it! -->
<!--
<div class="container">
  <div class="chatbox">
    <div class="top-bar">
      <div class="avatar"><p>V</p></div>
      <div class="name">Voldemort</div>
      <div class="icons">
        <i class="fas fa-phone"></i>
        <i class="fas fa-video"></i>
      </div>
      <div class="menu">
        <div class="dots"></div>
      </div>
    </div>
    <div class="middle">
      <div class="voldemort">
        <div class="incoming">
          <div class="bubble">Hey, Father's Day is coming up..</div>
          <div class="bubble">What are you getting.. Oh, oops sorry dude.</div>
        </div>
        <div class="outgoing">
          <div class="bubble lower">Nah, it's cool.</div>
          <div class="bubble">Well you should get your Dad a cologne. Here smell it. Oh wait! ...</div>
        </div>
        <div class="typing">
          <div class="bubble">
            <div class="ellipsis one"></div>
            <div class="ellipsis two"></div>
            <div class="ellipsis three"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="bottom-bar">
      <div class="chat">
        <input type="text" placeholder="Type a message..." />
        <button type="submit"><i class="fas fa-paper-plane"></i></button>
      </div>
    </div>
  </div>
  <div class="messages"></div>
  <div class="profile">
    <div class="avatar"><p>H</p></div>
    <div class="name2">Harry<p class="email">Harry@potter.com</p></div>
  </div>
  <ul class="people">
    <li class="person focus">
      <span class="title">Voldemort </span>
      <span class="time">2:50pm</span><br>
      <span class="preview">What are you getting... Oh, oops...</span>
    </li>
     <li class="person">
      <span class="title">Ron</span>
      <span class="time">2:25pm</span><br>
      <span class="preview">Meet me at Hogsmeade and bring...</span>
    </li>
    <li class="person">
      <span class="title">Hermione</span>
      <span class="time">2:12pm</span><br>
      <span class="preview">Have you and Ron done your hom...</span>
    </li>
  </ul>
</div>

<script src="../assets/js/chat.js" ></script>
</html>

-->

@livewireStyles
@foreach ($users as $user)
                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                  <div class="avatar me-3">
                    <img src="../assets/img/kal-visuals-square.jpg" alt="kal" class="border-radius-lg shadow">
                  </div>
                  <div class="d-flex align-items-start flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">{{$user->name}}</h6>
                    <p class="mb-0 text-xs">Hi! I need more information..</p>
                  </div>

                  <a wire:click="$emit('showMessages', {{ $user->id }})" class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a>
                </li>
@endforeach

@if ($this->selected)
<div class="container">
  <div class="chatbox">
    <div class="top-bar">
      <div class="avatar"><p>V</p></div>
      <div class="name">$selected->name</div>
      <div class="icons">
        <i class="fas fa-phone"></i>
        <i class="fas fa-video"></i>
      </div>
      <div class="menu">
        <div class="dots"></div>
      </div>
    </div>
    <div class="middle">
      <div class="voldemort">
        <div class="incoming">
          <div class="bubble">Hey, Father's Day is coming up..</div>
          <div class="bubble">What are you getting.. Oh, oops sorry dude.</div>
        </div>
        <div class="outgoing">
          <div class="bubble lower">Nah, it's cool.</div>
          <div class="bubble">Well you should get your Dad a cologne. Here smell it. Oh wait! ...</div>
        </div>
        </div>
      </div>
    </div>
    <div class="bottom-bar">
      <div class="chat">
        <input type="text" placeholder="Type a message..." />
        <button type="submit"><i class="fas fa-paper-plane"></i></button>
      </div>
    </div>
  </div>
  <div class="messages"></div>
  <div class="profile">
    <div class="avatar"><p>H</p></div>
    <div class="name2">Harry<p class="email">Harry@potter.com</p></div>
  </div>

</div>
@endif

@livewireScripts  

</div>
