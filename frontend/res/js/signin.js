var page = {};

page.getUrlParam = function(sParam) {
   var sPageURL = decodeURIComponent(window.location.search.substring(1)),
       sURLVariables = sPageURL.split('&'),
       sParameterName,
       i;

   for (i = 0; i < sURLVariables.length; i++) {
      sParameterName = sURLVariables[i].split('=');

      if (sParameterName[0] === sParam) {
         return sParameterName[1] === undefined ? true : sParameterName[1];
      }
   }
};

(function() {
   $.validator.setDefaults({
      errorElement: 'label'

   });
   $('#fm1').validate({
      rules: {
         username: {
            required: true,
            email: true
         },
         password: {
            required: true,
            minlength: 6
         }
      },
      messages: {
         username: {
            required: '请输入登录账号',
            email: '登录账号必须为邮箱'
         },
         password: {
            required: '请输入密码',
            minlength: '密码长度不能小于6位'
         }

      }
   });

   var smartRedirect = encodeURIComponent(page.getUrlParam('smartRedirect'));
   $('#smartRedirect').val(smartRedirect);

}());

