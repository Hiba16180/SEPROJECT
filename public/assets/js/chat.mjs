import Echo from '../../../node_modules/laravel-echo';
import Larasocket from '../../../node_modules/larasocket-js';
window.Echo = new Echo({
    broadcaster: Larasocket,
    token:  '3321|LxDseSQyVA7NiGP1bIUIKqMEaGCbFsFGkJtsx8rJ',
});
 window.Echo.channel('chat')
     .listen('SentMessage', (e) => {
         console.log(e.message);
     });