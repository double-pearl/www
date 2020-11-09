var xhr = new XMLHttpRequest();

xhr.onload = function(){
responseObject = JSON.parse(xhr.responseText);

var newContent = ' ';
for (var i = 0; i < responseObject.events.length; i++) {
newContent += '<div class="event">';
newContent += '<img src="'+ responseObject.events[i].map + '" ';
newContent += 'alt="' + responseObject.events[i].location + '" />';
newContent += '<dl><dt>' + responseObject.events[i].location + '</dt>';
newContent += '<dd>' + responseObject.events[i].date + '</dd>';
newContent += '<p>' + responseObject.events[i].addrr + '</p>';
newContent += '<p>' + responseObject.events[i].tele + '</p></dl>';
newContent += '</div>';

 document.getElementById('ppp').innerHTML = newContent;
}
  //}
};

xhr.open('GET', 'js/data.json', true);        // 요청을 준비한다.
xhr.send(null);    
