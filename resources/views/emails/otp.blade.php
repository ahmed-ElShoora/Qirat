<html>
  <body style="font-family: Arial, sans-serif; background-color: #f8f9fa; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background: #fff; border-radius: 10px; padding: 25px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
      
      <h2 style="color: #333; text-align: center;">Verify Your Email</h2>
      
      <p style="font-size: 16px; color: #444; line-height: 1.8; text-align: right; direction: rtl;">
        عزيزي المستخدم، <br><br>
        من فضلك عدم إرسال هذا الكود المتغير لأي شخص:
      </p>

      <!-- OTP BOX -->
      <div style="text-align: center; margin: 25px 0;">
        <div style="
            display: inline-block;
            background: #f1f1f1;
            padding: 15px 25px;
            border-radius: 10px;
            font-size: 28px;
            letter-spacing: 6px;
            font-weight: bold;
            color: #333;
        ">
          {{ $otp }}
        </div>
      </div>

      <p style="font-size: 15px; color: #555; line-height: 1.8; text-align: right; direction: rtl;">
        هذا الكود صالح لمدة <strong>10 دقائق فقط</strong>.<br>
        لا تشارك هذا الكود مع أي شخص.
      </p>

      <hr style="margin: 25px 0;">

      <p style="font-size: 14px; color: #777; text-align: center; direction: rtl;">
        إذا لم تقم بإنشاء هذا الكود، يمكنك تجاهل هذه الرسالة.
      </p>

    </div>
  </body>
</html>