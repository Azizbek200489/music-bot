<?php
date_default_timezone_set("asia/Tashkent");
$token = '5098445304:AAGsPAmsS6QMlPNb2HSELzRSRpS08HAn_DA';
$admin = ["1446203182"];
$adminn ="2113361950";

function bot($method,$datas=[]){
global $token;
    $url = "https://api.telegram.org/bot".$token."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}


function put($joy,$matn){
$saqla=file_put_contents($joy, $matn);
return $saqla;
}

function mb($joy,$matn){
$sss = mb_stripos($joy,$matn);
return $sss;
}


function get($ccc){
$tek=file_put_contents($ccc);
return $tek;
}

function del($content){
unlink($content);
}


require ("sql.php");



$update = json_decode(file_get_contents('php://input'));
$data = $update->callback_query->data;
$cid2 = $update->callback_query->message->chat->id;
$mid2 = $update->callback_query->message->message_id;
$fid2 = $update->callback_query->message->from->id;
$call = $update->callback_query;
$qid = $call->id;
$xabar = $update->message;
$xabar_id = $xabar->message_id;
$chat_id = $xabar->chat->id;
$cid = $xabar->chat->id;
$mid = $xabar->message_id;
$text = $xabar->text;
$name = $message->from->first_name;
$step = file_get_contents("step/$cid.txt");
mkdir("step");


if(!empty($update->message->audio)){
	$mp3 = true;
			$doc_id = $update->message->audio->file_id; 
            $doc_f = $update->message->audio->title." - ".$update->message->audio->performer;
            $doc_s = $update->message->audio->file_size;
}

$fid = $xabar->from->id;
$fname = $xabar->from->first_name;
$fuser = $xabar->from->username;
$sana = date('d.m.Y');
$soat = date('H:i:s');
$call = $update->callback_query;
$qid = $call->id;
$type = $xabar->chat->type;
$botname = "@botname";
$k1 = json_encode([
'inline_keyboard'=>[
[["text"=>"❤️","callback_data"=>"my"],["text"=>"❎","callback_data"=>"del"],["text"=>"💔","callback_data"=>"my1"]],
]
]);

$ball = json_encode([
'inline_keyboard'=>[
[["text"=>"⭐️","callback_data"=>"01"]],
[["text"=>"⭐️⭐️","callback_data"=>"02"]],
[["text"=>"⭐️⭐️⭐️","callback_data"=>"03"]],
[["text"=>"⭐️⭐️⭐️⭐️","callback_data"=>"04"]],
[["text"=>"⭐️⭐️⭐️⭐️⭐️","callback_data"=>"05"]],
]
]);

$reklamauz = "<i>🔥Reklama: SmartXost.Ru - Tezkor Xosting</i>";
$reklamaru = "<i>🔥Реклама: SmartXost.Ru - Надёжный хостинг</i>";

if($text=="/speed" or $text == "/speed$botname"){
$start_time = round(microtime(true) * 1000);
      $send=  bot('sendmessage', [
                'chat_id' => $cid,
                'text' =>"Loading...",
            ])->result->message_id;

                    $end_time = round(microtime(true) * 1000);
                    $time_taken = $end_time - $start_time;
                    bot('editMessagetext',[
                        "chat_id" => $cid,
                        "message_id" => $send,
                        "text" => "Bot Tezligi: " . $time_taken .  "Ms",
]);
}


$lan = json_encode([
'inline_keyboard'=>[
[["text"=>"🇺🇿O`zbek tili","callback_data"=>"0"]],
[["text"=>"🇷🇺Русский язык","callback_data"=>"1"]],
[["text"=>"❎","callback_data"=>"del"]],
]
]);

$txt = "<b>Sizga istalgan turdagi mp3 larni (qoʻshiqlarni) izlashda yordamlashaman !

/top - Eng ko`p yuklab olingan mp3lar.
/help - Barcha buyruqlar jamlanmasi!
/rand - Tasodifiy mp3lar.
/last - Eng oxirgi qo`shilgan mp3lar.
/add - Botga fayl yuklash buyicha yo`riqnoma.
/settings - Tilni o`zgartirish</b>


<i>🔎 Kerakli musiqa nomini yozib yuboring...</i>


$reklamauz";


$txt2 = "<b> Я помогу вам найти mp3 (песни) любого типа!

/top - Самые скачиваемые mp3.
/help - Все команды установлены!
/rand - Случайные mp3.
/last - Последние добавленные mp3.
/add - Инструкция по загрузке файлов в бот.
/settings - изменить язык </b>


<i>🔎 Введите желаемое имя музику...</i>


$reklamaru";


$topilmadi = "Hech narsa topilmadi 😔";

$topilmadi2 = "Ничего не нашлось 😔";


if($text=="/start"  or $text=="/start$botname" or $text=="/start php"){
$result = mysqli_query($connect,"SELECT * FROM users WHERE user_id = '$cid'");
$row = mysqli_fetch_assoc($result);
$lang = $row['lang'];
if($row){
if($lang=="0"){
bot('sendmessage',[
        'chat_id'=>$cid,
        'text'=>$txt,
        'parse_mode'=>'html',
]);
file_put_contents("step/$cid.txt",'music');
exit();
}elseif($lang=="1"){
bot('sendmessage',[
        'chat_id'=>$cid,
        'text'=>$txt2,
        'parse_mode'=>'html',
]);
file_put_contents("step/$cid.txt",'music');
exit();
}
}else{
mysqli_query($connect, "INSERT INTO users(`user_id`,`reg`) VALUES ('$cid','$sana--$soat')");
$result = mysqli_query($connect,"SELECT * FROM users WHERE user_id = '$cid'");
$row = mysqli_fetch_assoc($result);
$lang = $row['lang'];
if($lang=="0"){
bot('sendmessage',[
        'chat_id'=>$cid,
        'text'=>$txt,
        'parse_mode'=>'html',
]);
file_put_contents("step/$cid.txt",'music');
exit();
}elseif($lang=="1"){
bot('sendmessage',[
        'chat_id'=>$cid,
        'text'=>$txt2,
        'parse_mode'=>'html',
]);
file_put_contents("step/$cid.txt",'music');
exit();
}
}
}


//Delete

if($data == "del"){
	bot ('answerCallbackQuery', [
	'cache_time'=>0,
    'callback_query_id'=> $qid,
    'show_alert'=>false,
]);
	bot('deletemessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
]);
}


$buyruquz = "<b>🥳 Buyruqlar!!

/top - Eng ko`p yuklab olingan mp3lar.
/help - Barcha buyruqlar jamlanmasi!
/rand - Tasodifiy mp3lar.
/last - Eng oxirgi qo`shilgan mp3lar.
/add - Botga fayl yuklash buyicha yo`riqnoma.
/settings - Tilni o`zgartirish</b>


<i>🔎 Kerakli musiqa nomini yozib yuboring...</i>


$reklamauz";

$buyruqru = "<b>🥳 Команды!!

/top - Самые скачиваемые mp3.
/help - Все команды установлены!
/rand - Случайные mp3.
/last - Последние добавленные mp3.
/add - Инструкция по загрузке файлов в бот.
/settings - изменить язык </b>


<i>🔎 Введите желаемое имя музику...</i>


$reklamaru";


if((mb_stripos($text, "help") !== false) or (mb_stripos($text, "/help") !== false)){
$result = mysqli_query($connect,"SELECT * FROM users WHERE user_id = '$cid'");
$row = mysqli_fetch_assoc($result);
$lang = $row['lang'];
if($lang=="0"){
	bot('sendmessage',[
	'chat_id'=>$cid,
	'text'=>$buyruquz,
	'parse_mode'=>"html",
]);
exit();
}elseif($lang == "1"){
	bot('sendmessage',[
	'chat_id'=>$cid,
	'text'=>$buyruqru,
	'parse_mode'=>"html",
]);
exit();
}
}


if($text=="/add"  or $text=="/add$botname"){
$result = mysqli_query($connect,"SELECT * FROM users WHERE user_id = '$cid'");
$row = mysqli_fetch_assoc($result);
$lang = $row['lang'];
if($lang=="0"){
bot('sendmessage',[
        'chat_id'=>$cid,
        'text'=>"<b>Botga barcha foydalanuchilar mp3 yuklashi mumkin!
Mp3 yuklamoqchi bo`lsangiz shunchaki botga mp3ni yuboring...</b>

$reklamauz",
        'parse_mode'=>'html',
        ]);
exit();
}elseif($lang=="1"){
bot('sendmessage',[
        'chat_id'=>$cid,
        'text'=>"<b>Все пользователи бота могут скачать mp3!
Если вы хотите скачать mp3, просто отправьте mp3 боту ...</b>

$reklamaru",
        'parse_mode'=>'html',
        ]);
exit();
}
}









if($data=="my"){
$result = mysqli_query($connect,"SELECT * FROM users WHERE user_id = '$cid2'");
$row = mysqli_fetch_assoc($result);
$lang = $row['lang'];
if($lang=="0"){
bot ('answerCallbackQuery', [
'callback_query_id'=> $qid,
'text'=>"Bu sizga yoqti",
'show_alert'=>false,
]);
exit();
}elseif($lang=="1"){
bot ('answerCallbackQuery', [
'callback_query_id'=> $qid,
'text'=>"Тебе понравилось",
'show_alert'=>false,
]);
exit();
}
}

if($data=="my1"){
$result = mysqli_query($connect,"SELECT * FROM users WHERE user_id = '$cid2'");
$row = mysqli_fetch_assoc($result);
$lang = $row['lang'];
if($lang=="0"){
bot ('answerCallbackQuery', [
'callback_query_id'=> $qid,
'text'=>"Bu sizga yoqmadi",
'show_alert'=>false,
]);
exit();
}elseif($lang=="1"){
bot ('answerCallbackQuery', [
'callback_query_id'=> $qid,
'text'=>"Тебе это не понравилось",
'show_alert'=>false,
]);
exit();
}
}





$size = fsize($doc_s);
function fsize($size,$round=2)
{
$sizes=array(' Bytes',' Kb',' Mb',' Gb',' Tb');
$total=count($sizes)-1;
for($i=0;$size>1024 && $i<$total;$i++){
$size/=1024;
}
return round($size,$round).$sizes[$i];
}

if(($mp3) and $type=="private"){
$result7 = mysqli_query($connect,"SELECT * FROM `users` WHERE `user_id` = '$cid'");
$row7 = mysqli_fetch_assoc($result7);
$lang = $row7['lang'];
if($mp3){
$result = mysqli_query($connect,"SELECT * FROM `data` WHERE `name` = '$doc_f'");
$row = mysqli_fetch_assoc($result);
}
if($row){
if($lang=="0"){
bot('sendMessage',[
  'chat_id'=>$cid,
  'text'=>"<b>Ushbu $doc_f fayl bazada mavjud
Iltimos boshqa fayl yuboring yoki fayl nomiga qo`shimchalar qo`shing !</b>

$reklamauz",
 'parse_mode'=>'html',
  'disable_web_page_preview'=>true,
        ]);
exit();
}elseif($lang=="1"){
bot('sendMessage',[
  'chat_id'=>$cid,
  'text'=>"<b>Этот файл $doc_f доступен в базе данных
Пожалуйста, отправьте другой файл или добавьте вложения к имени файла!</b>

$reklamaru",
 'parse_mode'=>'html',
  'disable_web_page_preview'=>true,
        ]);
exit();
}
}else{
if($mp3){
$a = mysqli_query($connect, "INSERT INTO data (`name`,`doc_id`,`size`,`creator`,`type`) VALUES ('$doc_f','$doc_id','$size','$fid','')");
$eror = mysqli_error($connect);
}
if($a){
$result7 = mysqli_query($connect,"SELECT * FROM `users` WHERE `user_id` = '$cid'");
$row7 = mysqli_fetch_assoc($result7);
$lang = $row7['lang'];
if($lang=="0"){
bot('sendMessage',[
  'chat_id'=>$cid,
  'text'=>"✅Fayl yuklandi !
$doc_f - $size

$reklamauz",
 'parse_mode'=>'html',
  'disable_web_page_preview'=>true,
        ]);
}elseif($lang=="1"){
bot('sendMessage',[
  'chat_id'=>$kanal_id,
  'text'=>"✅Файл загружен!
$doc_f - $size

$reklamaru",
 'parse_mode'=>'html',
  'disable_web_page_preview'=>true,
        ]);
}

exit();
}else{
$result7 = mysqli_query($connect,"SELECT * FROM `users` WHERE `user_id` = '$fid'");
$row7 = mysqli_fetch_assoc($result7);
$lang = $row7['lang'];
if($lang=="0"){
bot('sendMessage',[
  'chat_id'=>$cid,
  'text'=>"<b>Baza bilan aloqa yo`q</b>",
 'parse_mode'=>'html',
        ]);
exit();
}elseif($lang=="1"){
bot('sendMessage',[
  'chat_id'=>$cid,
  'text'=>"<b>Нет подключения к базе данных </b>",
 'parse_mode'=>'html',
        ]);
exit();
}
}
}
}



if($text=="/stat"  or $text=="/stat$botname"){
$res = mysqli_query($connect, "SELECT * FROM `users`");
$stat = mysqli_num_rows($res);
$res2 = mysqli_query($connect, "SELECT * FROM `data`");
$stat2 = mysqli_num_rows($res2);
$res3 = mysqli_query($connect, "SELECT * FROM `data3`");
$stat3 = mysqli_num_rows($res3);
$result7 = mysqli_query($connect,"SELECT * FROM users WHERE user_id = '$cid'");
$row7 = mysqli_fetch_assoc($result7);
$lang = $row7['lang'];
if($lang=="0"){
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"📊<b>┌ STATISTIKA
👥├ A`zolar: <code>$stat</code>
🎧└ Yuklangan musiqa soni: <code>$stat2</code></b>

$reklamauz",
'parse_mode'=>'html',
'reply_markup'=> json_encode([
'inline_keyboard'=>[
[['text'=>"🔹Yangilash",'callback_data'=>"stat"]],
]
]),
]);
exit();
}elseif($lang=="1"){
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"📊<b>┌ СТАТИСТИКА
👥├ Члены: <code>$stat</code>
🎧└ Кол-во скачанной музыки: <code>$stat2</code></b>

$reklamaru",
'parse_mode'=>'html',
'reply_markup'=> json_encode([
'inline_keyboard'=>[
[['text'=>"🔹Обновлять",'callback_data'=>"stat"]],
]
]),
]);
exit();
}
}


if($data == "stat"){
$res = mysqli_query($connect, "SELECT * FROM `users`");
$stat = mysqli_num_rows($res);
$res2 = mysqli_query($connect, "SELECT * FROM `data`");
$stat2 = mysqli_num_rows($res2);
$res3 = mysqli_query($connect, "SELECT * FROM `data3`");
$stat3 = mysqli_num_rows($res3);
$result7 = mysqli_query($connect,"SELECT * FROM users WHERE user_id = '$cid2'");
$row7 = mysqli_fetch_assoc($result7);
$lang = $row7['lang'];
if($lang=="0"){
	bot('answerCallbackQuery',[
    'cache_time'=>0,
    'callback_query_id'=>$qid,
    'text'=>"Statistika Yangilandi ✅",
    'show_alert'=>false,
]);
	bot('editmessagetext',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"📊<b>┌ STATISTIKA
👥├ A`zolar: <code>$stat</code>
🎧└ Yuklangan musiqa soni: <code>$stat2</code></b>

$reklamauz",
'parse_mode'=>'html',
'reply_markup'=> json_encode([
'inline_keyboard'=>[
[['text'=>"🔹Yangilash",'callback_data'=>"stat"]],
]
]),
]);
exit();
}elseif($lang=="1"){
	bot('answerCallbackQuery',[
    'cache_time'=>0,
    'callback_query_id'=>$qid,
    'text'=>"Статистика обновлена ✅",
    'show_alert'=>false,
]);
bot('editmessagetext',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"📊<b>┌ СТАТИСТИКА
👥├ Члены: <code>$stat</code>
🎧└ Кол-во скачанной музыки: <code>$stat2</code></b>

$reklamaru",
'parse_mode'=>'html',
'reply_markup'=> json_encode([
'inline_keyboard'=>[
[['text'=>"🔹Обновлять",'callback_data'=>"stat"]],
]
]),
]);
exit();
}
}
	
	
	
if($text=="/settings"  or $text=="/settings$botname"){
$result7 = mysqli_query($connect,"SELECT * FROM users WHERE user_id = '$cid'");
$row7 = mysqli_fetch_assoc($result7);
$lang = $row7['lang'];
if($lang=="0"){
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Hozirgi til:</b> <i>🇺🇿O`zbek tili</i>

$reklamauz",
'parse_mode'=>'html',
'reply_markup'=>$lan,
]);
exit();
}elseif($lang=="1"){
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Текущий язык:</b> <i>🇷🇺Русский язык</i>

$reklamaru",
'parse_mode'=>'html',
'reply_markup'=>$lan,
]);
exit();
}
}


if($data=="0" or $data=="1"){
mysqli_query($connect,"UPDATE users SET  lang = '$data' WHERE user_id = '$cid2'");
$str = str_replace(["0","1"],["<b>Hozirgi til:</b> <i>🇺🇿O`zbek tili</i>","<b>Текущий язык:</b> <i>🇷🇺Русский язык</i>"],$data);
$result7 = mysqli_query($connect,"SELECT * FROM users WHERE user_id = '$cid2'");
$row7 = mysqli_fetch_assoc($result7);
$lang = $row7['lang'];
if($lang == "0"){
    bot('answerCallbackQuery',[
    'cache_time'=>0,
    'callback_query_id'=>$qid,
    'text'=>"Til yangilandi ✅",
    'show_alert'=>false,
]);
bot('editmessagetext',[
    'chat_id'=>$cid2,
    'message_id'=>$mid2,
    'text'=>"$str

$reklamauz",
    'parse_mode'=>"html",
    'reply_markup'=>$lan,
]);
exit();
}
if($lang == "1"){
   bot('answerCallbackQuery',[
    'cache_time'=>0,
    'callback_query_id'=>$qid,
    'text'=>"Язык обновлен ✅",
    'show_alert'=>false,
]);
    bot('editmessagetext',[
    'chat_id'=>$cid2,
    'message_id'=>$mid2,
    'text'=>"$str

$reklamaru",
    'parse_mode'=>"html",
    'reply_markup'=>$lan,
]);
exit();
}
}



if((mb_stripos($text,"/del=")!==false) and (in_array($cid,$admin))){
$e = explode("/del=",$text);
$e = $e[1];
$r = mysqli_query($connect,"DELETE FROM `data` WHERE `name` = '$e'");
if($r){
bot('sendMessage',[
  'chat_id'=>$cid,
  'text'=>"🗑<b>O`chirildi</b>
$e",
 'parse_mode'=>'html',
        ]);
exit();
}else{
bot('sendMessage',[
  'chat_id'=>$cid,
  'text'=>"<b>Fayl topilmadi baza bilan aloqa yo`q</b>
$e",
 'parse_mode'=>'html',
        ]);
exit();
}
exit();
}


if($text=="/inn" or $text=="/inn$botname"){
$result7 = mysqli_query($connect,"SELECT * FROM users WHERE user_id = '$cid'");
$row7 = mysqli_fetch_assoc($result7);
$lang = $row7['lang'];
if($lang == "0"){
    bot ('sendmessage',[
        'chat_id'=>$cid,
        'text'=>"<b>Botni inline rejimda ham sinab koʻrishingiz mumkin!🥳🥳</b>

$reklamauz",
        'parse_mode'=>'html',
        'disable_web_page_preview'=>true,
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[["text"=>"Inline","switch_inline_query"=>"Janob Rasul"],],
]
]),
]);
exit();
}elseif($lang == "1"){
    bot ('sendmessage',[
        'chat_id'=>$cid,
        'text'=>"<b>Вы также можете попробовать встроенного бота!🥳🥳</b>

$reklamaru",
        'parse_mode'=>'html',
        'disable_web_page_preview'=>true,
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[["text"=>"Встроенный Попытайся","switch_inline_query"=>"Эльбрус"],],
]
]),
]);
exit();
}
}


if((mb_stripos($text,"/send=")!==false)){
$e = explode("/send=",$text);
$e = $e[1];
$res = mysqli_query($connect,"SELECT * FROM `users` LIMIT 350,772");
while($a = mysqli_fetch_assoc($res)){
$id = $a['user_id'];
bot('sendMessage',[
  'chat_id'=>$id,
  'text'=>$e,
 'parse_mode'=>'html',
        ]);
}
bot('sendMessage',[
  'chat_id'=>cid,
  'text'=>"Yuborildi",
 'parse_mode'=>'html',
        ]);
exit();
}

if((mb_stripos($text,"/ovoz=")!==false)){
$e = explode("/ovoz=",$text);
$e = $e[1];
bot('sendMessage',[
  'chat_id'=>$e,
  'text'=>"✔️Botimizga baxo bering !

 🚀tezligi,
 ✅sifat darajasi,
 🔐kodlarning havfsizlik darajasi,
 💎tashqi ko`rinishini baxolashga o`z hissangizni qo`shasiz degan umiddamiz.",
 'parse_mode'=>'html',
 'reply_markup'=>$ball,
        ]);
//}
bot('sendMessage',[
  'chat_id'=>1461491407,
  'text'=>"Yuborildi",
 'parse_mode'=>'html',
        ]);
exit();
}



if($data=="01" or $data=="02"  or $data=="03"  or $data=="04"  or $data=="05"){
$b = file_get_contents("ball.txt");
file_put_contents("ball.txt","$b\n$data");
bot('SendMessage',[
'chat_id'=>1461491407,
'text'=>"<b><a href='tg://user?id=$cid2'>$cid2</a> - Ovoz berdi. $data</b>",
'parse_mode'=>'html',
]);

bot('EditMessagetext',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<i>Biz bilan ekanligingizdan xursandmiz🙂
Ovoz  berganingiz uchun raxmat !</i>",
'parse_mode'=>'html',
]);
exit();
}



if($text=="/top" or $text=="/top$botname"){
$result7 = mysqli_query($connect,"SELECT * FROM users WHERE user_id = '$cid'");
$row7 = mysqli_fetch_assoc($result7);
$lang = $row7['lang'];
$res = mysqli_query($connect,"SELECT * FROM `data`ORDER BY top DESC LIMIT 10");
while($a = mysqli_fetch_assoc($res)){
$vid = $a['doc_id'];
$f = $a['name'];
$size = $a['size'];
$id = $a['id'];
$k .= "$f-<i>$size</i>\n";
$u .= "$id\n";
}
$g = substr_count($k,"\n");
$g = $g - 1;
for ($i=0; $i <=$g; $i++){
$ii = $i + 1;
$a = explode("\n",$k);
$a1 = explode("\n",$u);
$b .="$ii. $a[$i]\n";
$b1 .="$a1[$i]\n";
}

$b1 = "".$b1."del";

$knopka = explode("\n",$b1);
$so = explode("\n",$so);
$f = count($knopka);
for($s=0;$s<$f;$s++){
$ss = $s + 1;
if($s==10){
$ss = "❎";
}
$uz[]=["text"=>"$ss","callback_data"=>"mp3_$knopka[$s]"];
}
$key=array_chunk($uz, 5);

$keyboard=json_encode([
'inline_keyboard'=>$key,
]);

if($lang == "0"){
bot('sendMessage',[
  'chat_id'=>$cid,
  'text'=>"<b>Top 10:</b>

$b

$reklamauz",
'reply_markup'=>$keyboard,
 'parse_mode'=>'html',
 'disable_web_page_preview'=>true,
        ]);
exit();
}elseif($lang == "1"){
	bot('sendMessage',[
  'chat_id'=>$cid,
  'text'=>"<b>Вершина 10:</b>

$b

$reklamaru",
'reply_markup'=>$keyboard,
 'parse_mode'=>'html',
 'disable_web_page_preview'=>true,
        ]);
exit();
}}



if($text=="/last"  or $text=="/last$botname"){
$result7 = mysqli_query($connect,"SELECT * FROM users WHERE user_id = '$cid'");
$row7 = mysqli_fetch_assoc($result7);
$lang = $row7['lang'];
$res = mysqli_query($connect,"SELECT * FROM `data`ORDER BY id DESC LIMIT 10");
while($a = mysqli_fetch_assoc($res)){
$vid = $a['doc_id'];
$f = $a['name'];
$size = $a['size'];
$id = $a['id'];
$k .= "$f-<i>$size</i>\n";
$u .= "$id\n";
}
$g = substr_count($k,"\n");
$g = $g - 1;
for ($i=0; $i <=$g; $i++){
$ii = $i + 1;
$a = explode("\n",$k);
$a1 = explode("\n",$u);
$b .="$ii. $a[$i]\n";
$b1 .="$a1[$i]\n";
}

$b1 = "".$b1."del";

$knopka = explode("\n",$b1);
$so = explode("\n",$so);
$f = count($knopka);
for($s=0;$s<$f;$s++){
$ss = $s + 1;
if($s==10){
$ss = "❎";
}
$uz[]=["text"=>"$ss","callback_data"=>"mp3_$knopka[$s]"];
}
$key=array_chunk($uz, 5);

$keyboard=json_encode([
'inline_keyboard'=>$key,
]);
if($lang=="0"){
bot('sendMessage',[
  'chat_id'=>$cid,
  'text'=>"<b>Eng Oxirgi fayllar:</b>

$b


$reklamauz",
'reply_markup'=>$keyboard,
 'parse_mode'=>'html',
  'disable_web_page_preview'=>true,
        ]);
exit();
}elseif($lang=="1"){
bot('sendMessage',[
  'chat_id'=>$cid,
  'text'=>"<b>Последние файлы:</b>

$b


$reklamaru",
'reply_markup'=>$keyboard,
 'parse_mode'=>'html',
  'disable_web_page_preview'=>true,
        ]);
exit();
}
}


if($text == "/rand" or $text == "/rand$botname"){
$result7 = mysqli_query($connect,"SELECT * FROM users WHERE user_id = '$cid'");
$row7 = mysqli_fetch_assoc($result7);
$lang = $row7['lang'];
$res = mysqli_query($connect,"SELECT * FROM `data` ORDER BY RAND() LIMIT 15");
while($a = mysqli_fetch_assoc($res)){
$vid = $a['doc_id'];
$f = $a['name'];
$size = $a['size'];
$id = $a['id'];
$k .= "$f-<i>$size</i>\n";
$u .= "$id\n";
}
$g = substr_count($k,"\n");
$g = $g - 1;
for ($i=0; $i <=$g; $i++){
$ii = $i + 1;
$a = explode("\n",$k);
$a1 = explode("\n",$u);
$b .="$ii. $a[$i]\n";
$b1 .="$a1[$i]\n";
}

$b1 = "".$b1."del";

$knopka = explode("\n",$b1);
$so = explode("\n",$so);
$f = count($knopka);
for($s=0;$s<$f;$s++){
$ss = $s + 1;
if($s==15){
$ss = "❎";
}
$uz[]=["text"=>"$ss","callback_data"=>"mp3_$knopka[$s]"];
}
$key=array_chunk($uz, 5);

$keyboard=json_encode([
'inline_keyboard'=>$key,
]);
if($lang == "0"){
bot('sendMessage',[
  'chat_id'=>$cid,
  'text'=>"<b>Rand 15:</b>

$b

$reklamauz",
'reply_markup'=>$keyboard,
 'parse_mode'=>'html',
  'disable_web_page_preview'=>true,
        ]);
exit();
}elseif($lang == "1"){
	bot('sendMessage',[
  'chat_id'=>$cid,
  'text'=>"<b>Смешанный 15:</b>

$b

$reklamaru",
'reply_markup'=>$keyboard,
 'parse_mode'=>'html',
  'disable_web_page_preview'=>true,
        ]);
exit();
}}



if($type=="supergroup" or $type=="group"){
if(mb_stripos($text,"/m ")!==false){
$p = explode("/m ",$text)[1];
$result7 = mysqli_query($connect,"SELECT * FROM users WHERE user_id = '$cid'");
$row7 = mysqli_fetch_assoc($result7);
$lang = $row7['lang'];
$son = mb_strlen($p);
if($son>1){
$res = mysqli_query($connect,"SELECT * FROM `data` WHERE `name`  LIKE '%$p%' OR `creator` LIKE '%$p%'");
if(mysqli_fetch_assoc($res)){
$stat = mysqli_num_rows($res);
$res = mysqli_query($connect,"SELECT * FROM `data` WHERE `name`  LIKE '%$p%' OR `creator` LIKE '%$p%' LIMIT 0,10");
while($a = mysqli_fetch_assoc($res)){
$vid = $a['doc_id'];
$f = $a['name'];
$size = $a['size'];
$id = $a['id'];
$k .= "$f-<i>$size</i>\n";
$u .= "$id\n";
}
$g = substr_count($k,"\n");
$g = $g - 1;
for ($i=0; $i <=$g; $i++){
$ii = $i + 1;
$a = explode("\n",$k);
$a1 = explode("\n",$u);
$b .="$ii. $a[$i]\n";
$b1 .="$a1[$i]\n";
$so .= "$ii\n";
}
$r = substr_count($b,"\n");

$so = "".$so."⏪\n❎\n⏩\n";
$b1 = "".$b1."back_0\ndel\ngo_0_".$p."_1_".$stat."\n";

$knopka = explode("\n",$b1);
$so = explode("\n",$so);
$f = count($knopka);
$f = $f - 1;
for($s=0;$s<$f;$s++){
$uz[]=["text"=>"$so[$s]","callback_data"=>"mp3_$knopka[$s]"];
}
$key=array_chunk($uz, 5);

$keyboard=json_encode([
'inline_keyboard'=>$key,
]);
if($lang=="0"){
bot('sendMessage',[
  'chat_id'=>$cid,
  'text'=>"<b>Natijalar: 1-$r из $stat</b>

$b

$reklamauz",
'reply_markup'=>$keyboard,
 'parse_mode'=>'html',
  'disable_web_page_preview'=>true,
        ]);
exit();
}elseif($lang=="1"){
bot('sendMessage',[
  'chat_id'=>$cid,
  'text'=>"<b>Резултаты: 1-$r из $stat</b>

$b

$reklamaru",
'reply_markup'=>$keyboard,
 'parse_mode'=>'html',
  'disable_web_page_preview'=>true,
        ]);
exit();
}
}else{
if($lang=="0"){
bot('sendMessage',[
  'chat_id'=>$cid,
  'text'=>"<b>$topilmadi</b>

  $reklamauz",
  'parse_mode'=>"html",
  'reply_markup'=> json_encode([
  'inline_keyboard'=>[
[['text'=>"⏪",'callback_data'=>"bosh"],['text'=>"❎",'callback_data'=>"del"],['text'=>"⏩",'callback_data'=>"keyin"]],
]
]),
]);
}elseif($lang=="1"){
bot('sendMessage',[
  'chat_id'=>$cid,
  'text'=>"<b>$topilmadi2</b>

  $reklamaru",
  'parse_mode'=>"html",
  'reply_markup'=> json_encode([
  'inline_keyboard'=>[
[['text'=>"⏪",'callback_data'=>"bosh"],['text'=>"❎",'callback_data'=>"del"],['text'=>"⏩",'callback_data'=>"keyin"]],
]
]),
]);
}
exit();
}
}else{
if($lang=="0"){
bot('sendmessage',[
  'chat_id'=>$cid,
  'text'=>"Matn kamida 2 ta belgidan iborat bo`lsin!",
 'parse_mode'=>'html',
        ]);
exit();
}elseif($lang=="1"){
bot('sendmessage',[
  'chat_id'=>$cid,
  'text'=>"Убедитесь, что текст содержит не менее 2 символов!",
 'parse_mode'=>'html',
        ]);
exit();
}
}
}
exit();
}




if($type=="private" and $step == 'music'){
if($text){
$p = $text;
$result7 = mysqli_query($connect,"SELECT * FROM users WHERE user_id = '$cid'");
$row7 = mysqli_fetch_assoc($result7);
$lang = $row7['lang'];
$son = mb_strlen($p);
if($son>1){
$res = mysqli_query($connect,"SELECT * FROM `data` WHERE `name`  LIKE '%$p%' OR `creator` LIKE '%$p%'");
if(mysqli_fetch_assoc($res)){
$stat = mysqli_num_rows($res);
$res = mysqli_query($connect,"SELECT * FROM `data` WHERE `name`  LIKE '%$p%' OR `creator` LIKE '%$p%' LIMIT 0,10");
while($a = mysqli_fetch_assoc($res)){
$vid = $a['doc_id'];
$f = $a['name'];
$size = $a['size'];
$id = $a['id'];
$k .= "$f-<i>$size</i>\n";
$u .= "$id\n";
}
$g = substr_count($k,"\n");
$g = $g - 1;
for ($i=0; $i <=$g; $i++){
$ii = $i + 1;
$a = explode("\n",$k);
$a1 = explode("\n",$u);
$b .="$ii. $a[$i]\n";
$b1 .="$a1[$i]\n";
$so .= "$ii\n";
}
$r = substr_count($b,"\n");

$so = "".$so."⏪\n❎\n⏩\n";
$b1 = "".$b1."back_0\ndel\ngo_0_".$p."_1_".$stat."\n";

$knopka = explode("\n",$b1);
$so = explode("\n",$so);
$f = count($knopka);
$f = $f - 1;
for($s=0;$s<$f;$s++){
$uz[]=["text"=>"$so[$s]","callback_data"=>"mp3_$knopka[$s]"];
}
$key=array_chunk($uz, 5);

$keyboard=json_encode([
'inline_keyboard'=>$key,
]);
if($lang=="0"){
bot('sendMessage',[
  'chat_id'=>$cid,
  'text'=>"<b>Natijalar: 1-$r из $stat</b>

$b

$reklamauz",
'reply_markup'=>$keyboard,
 'parse_mode'=>'html',
  'disable_web_page_preview'=>true,
        ]);
exit();
}elseif($lang=="1"){
bot('sendMessage',[
  'chat_id'=>$cid,
  'text'=>"<b>Резултаты: 1-$r из $stat</b>

$b

$reklamaru",
'reply_markup'=>$keyboard,
 'parse_mode'=>'html',
  'disable_web_page_preview'=>true,
        ]);
exit();
}
}else{

if($lang=="0"){
bot('sendMessage',[
  'chat_id'=>$cid,
  'text'=>"*$topilmadi*",
  'parse_mode'=>"markdown",
  'reply_markup'=> json_encode([
  'inline_keyboard'=>[
[['text'=>"⏪",'callback_data'=>"bosh"],['text'=>"❎",'callback_data'=>"del"],['text'=>"⏩",'callback_data'=>"keyin"]],
]
]),
]);
}elseif($lang=="1"){
bot('sendMessage',[
  'chat_id'=>$cid,
  'text'=>"*$topilmadi2*",
  'parse_mode'=>"markdown",
  'reply_markup'=> json_encode([
  'inline_keyboard'=>[
[['text'=>"⏪",'callback_data'=>"bosh"],['text'=>"❎",'callback_data'=>"del"],['text'=>"⏩",'callback_data'=>"keyin"]],
]
]),
]);
}

exit();
}
}else{
if($lang=="0"){
bot('sendmessage',[
  'chat_id'=>$cid,
  'text'=>"Matn kamida 2 ta belgidan iborat bo`lsin!

$reklama",
 'parse_mode'=>'html',
        ]);
exit();
}elseif($lang=="1"){
bot('sendmessage',[
  'chat_id'=>$cid,
  'text'=>"Убедитесь, что текст содержит не менее 2 символов!

  $reklama",
 'parse_mode'=>'html',
        ]);
exit();
}
}
}
exit();
}



if($data=="mp3_back_0"){
$result7 = mysqli_query($connect,"SELECT * FROM users WHERE user_id = '$cid2'");
$row7 = mysqli_fetch_assoc($result7);
$lang = $row7['lang'];
if($lang=="0"){
bot ('answerCallbackQuery', [
'callback_query_id'=> $qid,
'text'=>"Siz 1-sahifadasiz !",
'show_alert'=>false,
]);
exit();
}elseif($lang=="1"){
bot ('answerCallbackQuery', [
'callback_query_id'=> $qid,
'text'=>"Вы на странице 1 !",
'show_alert'=>false,
]);
exit();
}
}

if (mb_stripos($data,"mp3_go_")!==false){
$d = explode("_", $data);
$result7 = mysqli_query($connect,"SELECT * FROM users WHERE user_id = '$cid2'");
$row7 = mysqli_fetch_assoc($result7);
$lang = $row7['lang'];
$son = $d[2];
$son = explode("_",$son);
$son = $son[0];
$name = $d[3];
$name = explode("_",$name);
$name = $name[0];
$sn = $d[4];
$sn = explode("_",$sn);
$sn = $sn[0];
$stat = $d[5];
$stat = explode("_",$stat);
$stat = $stat[0];
$r = $d[6];

/////////////////
$son = $son + 10;
$sonn = $son - 10;
$sn = $sn + 1;
$snn = $sn - 1;
$res = mysqli_query($connect,"SELECT * FROM `data` WHERE `name`  LIKE '%$name%' OR `creator` LIKE '%$name%'");
if(mysqli_fetch_assoc($res)){
$res = mysqli_query($connect,"SELECT * FROM `data` WHERE name LIKE '%$name%' OR `creator` LIKE '%$name%' LIMIT $son,10");
while($a = mysqli_fetch_assoc($res)){
$vid = $a['doc_id'];
$f = $a['name'];
$size = $a['size'];
$id = $a['id'];
$k .= "$f-<i>$size</i>\n";
$u .= "$id\n";
}
$g = substr_count($k,"\n");
$g = $g - 1;
for ($i=0; $i <=$g; $i++){
$ii = $i + 1;
$a = explode("\n",$k);
$a1 = explode("\n",$u);
$b .="$ii. $a[$i]\n";
$b1 .="$a1[$i]\n";
$so .= "$ii\n";
}
$r = substr_count($b,"\n");
if(!$r=="0"){

$so = "".$so."⏪\n❎\n⏩\n";
$b1 = "".$b1."back_".$sonn."_".$name."_".$snn."_".$stat."\ndel\ngo_".$son."_".$name."_".$sn."_".$stat."\n";

$knopka = explode("\n",$b1);
$so = explode("\n",$so);
$f = count($knopka);
$f = $f - 1;
for($s=0;$s<$f;$s++){
$uz[]=["text"=>"$so[$s]","callback_data"=>"mp3_$knopka[$s]"];
}
$key=array_chunk($uz, 5);

$keyboard=json_encode([
'inline_keyboard'=>$key,
]);
if($lang=="0"){
bot('EditMessagetext',[
  'chat_id'=>$cid2,
  'message_id'=>$mid2,
  'text'=>"<b>Natijalar: $sn-$r из $stat</b>

$b

$reklamauz",
'reply_markup'=>$keyboard,
 'parse_mode'=>'html',
  'disable_web_page_preview'=>true,
        ]);
exit();
}elseif($lang=="1"){
bot('EditMessagetext',[
  'chat_id'=>$cid2,
  'message_id'=>$mid2,
  'text'=>"<b>Результаты: $sn-$r из $stat</b>

$b

$reklamaru",
'reply_markup'=>$keyboard,
 'parse_mode'=>'html',
  'disable_web_page_preview'=>true,
        ]);
exit();
}
}else{
if($lang=="0"){
bot ('answerCallbackQuery', [
'callback_query_id'=> $qid,
'text'=>"Siz oxirgi sahifadasiz !",
'show_alert'=>false,
]);
exit();
}elseif($lang=="1"){
bot ('answerCallbackQuery', [
'callback_query_id'=> $qid,
'text'=>"Вы на последней странице!",
'show_alert'=>false,
]);
exit();
}
}
}else{
if($lang=="0"){
bot('sendMessage',[
  'chat_id'=>$cid2,
  'text'=>"*$topilmadi*",
  'parse_mode'=>"markdown",
  'reply_markup'=> json_encode([
  'inline_keyboard'=>[
[['text'=>"⏪",'callback_data'=>"bosh"],['text'=>"❎",'callback_data'=>"del"],['text'=>"⏩",'callback_data'=>"keyin"]],
]
]),
]);
exit();
}elseif($lang=="1"){
bot('sendMessage',[
  'chat_id'=>$cid2,
  'text'=>"*$topilmadi2*",
  'parse_mode'=>"markdown",
  'reply_markup'=> json_encode([
  'inline_keyboard'=>[
[['text'=>"⏪",'callback_data'=>"bosh"],['text'=>"❎",'callback_data'=>"del"],['text'=>"⏩",'callback_data'=>"keyin"]],
]
]),
]);
exit();
}
}
exit();
}


if (mb_stripos($data,"mp3_back_")!==false){
$result7 = mysqli_query($connect,"SELECT * FROM users WHERE user_id = '$cid2'");
$row7 = mysqli_fetch_assoc($result7);
$lang = $row7['lang'];
$d = explode("_", $data);
if($d[4]==0){
if($lang=="0"){
bot ('answerCallbackQuery', [
'callback_query_id'=> $qid,
'text'=>"Siz 1-sahifadasiz !",
'show_alert'=>false,
]);
exit();
}elseif($lang=="1"){
bot ('answerCallbackQuery', [
'callback_query_id'=> $qid,
'text'=>"Вы на странице 1 !",
'show_alert'=>false,
]);
exit();
}
}
}


if($data == "bosh"){
$result7 = mysqli_query($connect,"SELECT * FROM users WHERE user_id = '$cid2'");
$row7 = mysqli_fetch_assoc($result7);
$lang = $row7['lang'];
if($lang=="0"){
bot ('answerCallbackQuery', [
'callback_query_id'=> $qid,
'text'=>"Siz 1-sahifadasiz !",
'show_alert'=>false,
]);
exit();
}elseif($lang=="1"){
bot ('answerCallbackQuery', [
'callback_query_id'=> $qid,
'text'=>"Вы на странице 1 !",
'show_alert'=>false,
]);
exit();
}
}

if($data == "keyin"){
$result7 = mysqli_query($connect,"SELECT * FROM users WHERE user_id = '$cid2'");
$row7 = mysqli_fetch_assoc($result7);
$lang = $row7['lang'];
if($lang=="0"){
bot ('answerCallbackQuery', [
'callback_query_id'=> $qid,
'text'=>"Siz oxirgi sahifadasiz !",
'show_alert'=>false,
]);
exit();
}elseif($lang=="1"){
bot ('answerCallbackQuery', [
'callback_query_id'=> $qid,
'text'=>"Вы на последней странице!",
'show_alert'=>false,
]);
exit();
}
}


if (mb_stripos($data,"mp3_back_")!==false){
$d = explode("_", $data);
$son = $d[2];
$son = explode("_",$son);
$son = $son[0];
$name = $d[3];
$name = explode("_",$name);
$name = $name[0];
$sn = $d[4];
$sn = explode("_",$sn);
$sn = $sn[0];
$stat = $d[5];
$stat = explode("_",$stat);
$stat = $stat[0];
$r = $d[6];

$sonn = $son - 10;
$snn = $sn - 1;
$result7 = mysqli_query($connect,"SELECT * FROM users WHERE user_id = '$cid2'");
$row7 = mysqli_fetch_assoc($result7);
$lang = $row7['lang'];
$res = mysqli_query($connect,"SELECT * FROM `data` WHERE `name`  LIKE '%$name%' OR `creator` LIKE '%$name%'");
if(mysqli_fetch_assoc($res)){
$res = mysqli_query($connect,"SELECT * FROM `data` WHERE name LIKE '%$name%' OR `creator` LIKE '%$name%' LIMIT $son,10");
while($a = mysqli_fetch_assoc($res)){
$vid = $a['doc_id'];
$f = $a['name'];
$size = $a['size'];
$id = $a['id'];
$k .= "$f-<i>$size</i>\n";
$u .= "$id\n";
}
$g = substr_count($k,"\n");
$g = $g - 1;
for ($i=0; $i <=$g; $i++){
$ii = $i + 1;
$a = explode("\n",$k);
$a1 = explode("\n",$u);
$b .="$ii. $a[$i]\n";
$b1 .="$a1[$i]\n";
$so .= "$ii\n";
}
$so = "".$so."⏪\n❎\n⏩\n";
$b1 = "".$b1."back_".$sonn."_".$name."_".$snn."_".$stat."\ndel\ngo_".$son."_".$name."_".$sn."_".$stat."\n";

$knopka = explode("\n",$b1);
$so = explode("\n",$so);
$f = count($knopka);
$f = $f - 1;
for($s=0;$s<$f;$s++){
$uz[]=["text"=>"$so[$s]","callback_data"=>"mp3_$knopka[$s]"];
}
$key=array_chunk($uz, 5);

$keyboard=json_encode([
'inline_keyboard'=>$key,
]);
$r = substr_count($b,"\n");
if($lang=="0"){
bot('EditMessagetext',[
  'chat_id'=>$cid2,
  'message_id'=>$mid2,
  'text'=>"<b>Natijalar: $sn-$r из $stat</b>

$b

$reklamauz",
'reply_markup'=>$keyboard,
 'parse_mode'=>'html',
  'disable_web_page_preview'=>true,
        ]);
exit();
}elseif($lang=="1"){
bot('EditMessagetext',[
  'chat_id'=>$cid2,
  'message_id'=>$mid2,
  'text'=>"<b>Результаты: $sn-$r из $stat</b>

$b

$reklamaru",
'reply_markup'=>$keyboard,
 'parse_mode'=>'html',
  'disable_web_page_preview'=>true,
        ]);
exit();
}
}else{
if($lang=="0"){
bot('sendMessage',[
  'chat_id'=>$cid2,
  'text'=>"*$topilmadi*",
  'parse_mode'=>"markdown",
  'reply_markup'=> json_encode([
  'inline_keyboard'=>[
[['text'=>"⏪",'callback_data'=>"bosh"],['text'=>"❎",'callback_data'=>"del"],['text'=>"⏩",'callback_data'=>"keyin"]],
]
]),
]);
exit();
}elseif($lang=="1"){
bot('sendMessage',[
  'chat_id'=>$cid2,
  'text'=>"*$topilmadi2*",
  'parse_mode'=>"markdown",
  'reply_markup'=> json_encode([
  'inline_keyboard'=>[
[['text'=>"⏪",'callback_data'=>"bosh"],['text'=>"❎",'callback_data'=>"del"],['text'=>"⏩",'callback_data'=>"keyin"]],
]
]),
]);
exit();
}
}
}




if (mb_stripos($data,"mp3_")!==false){
$d = explode("_", $data);
$dgh = $d[1];
$dh = explode("_",$dgh);
$d1 = $dh[0];
$sql = "SELECT * FROM `data` WHERE id = '$d1'";
$result = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($result);
$id = $row["doc_id"];
$f = $row["name"];
$t = $row["top"];
$c = $row["creator"];
$t = $t + 1;
mysqli_query($connect,"UPDATE data SET  top = '$t' WHERE id = '$d1'");

$result7 = mysqli_query($connect,"SELECT * FROM users WHERE user_id = '$cid2'");
$row7 = mysqli_fetch_assoc($result7);
$lang = $row7['lang'];
$get= bot ('getChat', [
'chat_id'=>$c,
]);
$g = $get->result->first_name;
if($lang=="0"){
bot('answerCallbackQuery',[
'cache_time'=>0,
'callback_query_id'=>$qid,
//'text'=>"Yuklanmoqda",
'show_alert'=>false
]);
bot('sendaudio',[
  'chat_id'=>$cid2,
  'audio'=>"$id",
  'caption'=>"<b>$f</b>

$reklamauz

<b>$botname</b>",
 'parse_mode'=>'html',
'reply_markup'=>$k1,
        ]);
exit();
}elseif($lang=="1"){
bot('answerCallbackQuery',[
'cache_time'=>0,
'callback_query_id'=>$qid,
//'text'=>"Yuklanmoqda",
'show_alert'=>false
]);
bot('sendaudio',[
  'chat_id'=>$cid2,
  'audio'=>"$id",
  'caption'=>"<b>$f</b>

$reklamaru

<b>$botname</b>",
 'parse_mode'=>'html',
'reply_markup'=>$k1,
        ]);
exit();
}
}




