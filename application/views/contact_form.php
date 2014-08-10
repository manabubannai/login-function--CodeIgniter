<div id="contact_form">
<h1>Contact Us</h1>
<?php
	echo form_open("contact/submit");
	echo form_input("name", "名前", "id='name'");
	echo form_input("email", "Email", "id='email'");

	$data = array(
		"name"=>"message",
		"cols"=>30,
		"rows"=>15
	);
	echo form_textarea($data, "メッセージ", "id='message'");

	echo form_submit("submit", "送信する", "id='submit'");
	echo form_close();
?>

<script type="text/javascript">
	$("#submit").click(function(){

		// nameのバリューを取得して、nameとして定義しておく
		var name = $("#name").val();

		// もし、上記で定義したnameが空欄、もしくは、初期値「名前」である場合、以下を実行
		if( !name || name =="名前"){
			alert ("名前を入力してください。");
			// ページ遷移をさせない。
			return false;
		};

		// フォームの送信データをAJAXで取得する
		var form_data = {
			name: $("#name").val(),
			email: $("#email").val(),
			message: $("#message").val(),
			ajax: "1"
		};

		// jQueryのAJAXファンクションを利用
		$.ajax({
			url: "<?php echo site_url('contact/submit') ?>",
			type: "POST",
			data: form_data,

			// url, POSTデータ, form_dataの取得に成功したら、mgsファンクションを実行する
			success: function(msg){
				$("#main_content").html(msg);
			}
		});

		return false;
	});
</script>
</div>