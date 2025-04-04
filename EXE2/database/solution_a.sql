-- File solution_a.sql

-- 1. Lay danh sach nguoi dung theo thu tu ten theo Alphabet (A -> Z)
SELECT * FROM users ORDER BY user_name ASC;

-- 2. Lay ra 07 nguoi dung theo thu tu ten theo Alphabet (A -> Z)
SELECT * FROM users ORDER BY user_name ASC LIMIT 7;

-- 3. Lay danh sach nguoi dung theo thu tu ten Alphabet (A -> Z), trong do ten nguoi dung co chua chu "a"
SELECT * FROM users WHERE user_name LIKE '%a%' ORDER BY user_name ASC;

-- 4. Lay danh sach nguoi dung trong do ten nguoi dung bat dau bang chu "m"
SELECT * FROM users WHERE user_name LIKE 'm%';

-- 5. Lay danh sach nguoi dung trong do ten nguoi dung ket thuc bang chu "i"
SELECT * FROM users WHERE user_name LIKE '%i';

-- 6. Lay ra danh sach nguoi dung co email thuoc Gmail
SELECT * FROM users WHERE user_email LIKE '%@gmail.com';

-- 7. Lay danh sach nguoi dung co email thuoc Gmail, ten nguoi dung bat dau bang chu "m"
SELECT * FROM users WHERE user_email LIKE '%@gmail.com' AND user_name LIKE 'm%';

-- 8. Lay danh sach nguoi dung co email thuoc Gmail, ten nguoi dung co chu "i" va co chieu dai lon hon 5
SELECT * FROM users WHERE user_email LIKE '%@gmail.com' AND user_name LIKE '%i%' AND LENGTH(user_name) > 5;

-- 9. Lay danh sach nguoi dung co chu "a", chieu dai tu 5 den 9, email thuoc Gmail, trong ten email co chu "i" va khong phai domain exampletest@yahoo.com
SELECT * FROM users WHERE user_name LIKE '%a%' AND LENGTH(user_name) BETWEEN 5 AND 9 AND user_email LIKE '%@gmail.com' AND user_email LIKE '%i%' AND user_email NOT LIKE '%@exampletest.yahoo.com';

-- 10. Lay danh sach nguoi dung co chu "a", chieu dai tu 5 den 9, hoac ten chua chu "i", chieu dai nho hon 9, hoac email thuoc Gmail, trong ten email co chu "i"
SELECT * FROM users WHERE (user_name LIKE '%a%' AND LENGTH(user_name) BETWEEN 5 AND 9) OR (user_name LIKE '%i%' AND LENGTH(user_name) < 9) OR (user_email LIKE '%@gmail.com' AND user_email LIKE '%i%');
