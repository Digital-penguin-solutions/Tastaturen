
WebFontConfig = { google: { families: [ 'Open+Sans:400,300,600,700:latin' ] } };
(function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ?
            'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
})();

var music = {
    106 : { id :'F-2', 			note :'F', 	sharp : false , octave : 2 , keyCodeNum : 106 	},
    107 : { id :'F-sharp-2', 	note :'F#', sharp : true , 	octave : 2 , keyCodeNum : 107 	},
    108 : { id :'G-2', 			note :'G', 	sharp : false , octave : 2 , keyCodeNum : 108 	},
    59  : { id :'G-sharp-2', 	note :'G#', sharp : true , 	octave : 2 , keyCodeNum : 59 	},
    113 : { id :'A-2', 			note :'A', 	sharp : false , octave : 2 , keyCodeNum : 113 	},
    119 : { id :'A-sharp-2', 	note :'A#', sharp : true , 	octave : 2 , keyCodeNum : 119 	},
    101 : { id :'B-2', 			note :'B', 	sharp : false , octave : 2 , keyCodeNum : 101 	},
    114 : { id :'C-2', 			note :'C', 	sharp : false , octave : 2 , keyCodeNum : 114 	},
    116 : { id :'C-sharp-2', 	note :'C#', sharp : true , 	octave : 2 , keyCodeNum : 116 	},
    121 : { id :'D-2', 			note :'D', 	sharp : false , octave : 2 , keyCodeNum : 121 	},
    117 : { id :'D-sharp-2', 	note :'D#', sharp : true , 	octave : 2 , keyCodeNum : 117 	},
    105 : { id :'E-3', 			note :'E', 	sharp : false , octave : 3 , keyCodeNum : 105 	}
};

(function(){
    for(var x in music){
        var el = document.getElementById(music[x].id + '-player');
        el.className = music[x].sharp == true ? 'black' : 'white';
    }
})();

document.onkeypress = function(event){
    var x = document.getElementById(music[event.keyCode || event.charCode].id);
    if(music[event.keyCode || event.charCode].sharp)
        document.getElementById(music[event.keyCode || event.charCode].id + '-player').className = 'black';
    else
        document.getElementById(music[event.keyCode || event.charCode].id + '-player').className = 'white';
    var y = document.getElementById(music[event.keyCode || event.charCode].id + '-player');
    var c = y.getAttribute('class');
    y.setAttribute('class', (c+' typed'));
    setTimeout(function(){return y.setAttribute('class',c)},200);
    x.volume = 1;
    x.currentTime = 0;
    x.play();
};

document.getElementById('switch-chars').children[0].style.display = 'none';

document.onclick = function(event){
    if(event.target.id == 'switch-chars'){
        var keys = document.getElementsByClassName('keys');
        var etc = event.target.children;
        var k = document.getElementsByClassName('keys');
        var n = document.getElementsByClassName('notes');
        etc[0].style.display = etc[0].style.display == 'none' ? 'block' : 'none';
        etc[1].style.display = etc[0].style.display == 'none' ? 'block' : 'none';
        for(var i = 0; i < k.length;i++){
            k[i].style.display = etc[0].style.display == 'none' ? 'block' : 'none';
            n[i].style.display = etc[1].style.display == 'none' ? 'block' : 'none';
        }
        return;
    }
    var d = event.target.dataset.keycode;
    if(!document.getElementById(music[d].id)) return;
    var x = document.getElementById(music[d].id);
    x.volume = 1;
    x.currentTime = 0;
    x.play();
};