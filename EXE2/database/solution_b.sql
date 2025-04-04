-- File: solution_b.sql

-- 1. Liet ke cac hoa don cua khach hang, thong tin hien thi gom: ma user, ten user, ma hoa don
SELECT users.user_id, users.user_name, orders.order_id 
FROM users 
JOIN orders ON users.user_id = orders.user_id;

-- 2. Liet ke so luong cac hoa don cua khach hang
SELECT users.user_id, users.user_name, COUNT(orders.order_id) AS so_luong_don_hang
FROM users 
LEFT JOIN orders ON users.user_id = orders.user_id
GROUP BY users.user_id, users.user_name;

-- 3. Liet ke thong tin hoa don: ma don hang, so san pham
SELECT orders.order_id, COUNT(order_items.product_id) AS so_san_pham
FROM orders 
JOIN order_items ON orders.order_id = order_items.order_id
GROUP BY orders.order_id;

-- 4. Liet ke thong tin mua hang cua nguoi dung
SELECT users.user_id, users.user_name, orders.order_id, GROUP_CONCAT(products.product_name) AS ten_san_pham
FROM users
JOIN orders ON users.user_id = orders.user_id
JOIN order_items ON orders.order_id = order_items.order_id
JOIN products ON order_items.product_id = products.product_id
GROUP BY orders.order_id;

-- 5. Liet ke 7 nguoi dung co so luong don hang nhieu nhat
SELECT users.user_id, users.user_name, COUNT(orders.order_id) AS so_luong_don_hang
FROM users 
JOIN orders ON users.user_id = orders.user_id
GROUP BY users.user_id, users.user_name
ORDER BY so_luong_don_hang DESC
LIMIT 7;

-- 6. Liet ke 7 nguoi dung mua san pham co ten chua 'Samsung' hoac 'Apple'
SELECT users.user_id, users.user_name, orders.order_id, GROUP_CONCAT(products.product_name) AS ten_san_pham
FROM users
JOIN orders ON users.user_id = orders.user_id
JOIN order_items ON orders.order_id = order_items.order_id
JOIN products ON order_items.product_id = products.product_id
WHERE products.product_name LIKE '%Samsung%' OR products.product_name LIKE '%Apple%'
GROUP BY orders.order_id
LIMIT 7;

-- 7. Liet ke danh sach mua hang cua user bao gom gia tien cua moi don hang
SELECT users.user_id, users.user_name, orders.order_id, SUM(products.product_price * order_items.quantity) AS tong_tien
FROM users
JOIN orders ON users.user_id = orders.user_id
JOIN order_items ON orders.order_id = order_items.order_id
JOIN products ON order_items.product_id = products.product_id
GROUP BY orders.order_id;

-- 8. Liet ke moi user chi chon ra 1 don hang co gia tien lon nhat
SELECT user_id, user_name, order_id, tong_tien FROM (
    SELECT users.user_id, users.user_name, orders.order_id, SUM(products.product_price * order_items.quantity) AS tong_tien,
           RANK() OVER (PARTITION BY users.user_id ORDER BY SUM(products.product_price * order_items.quantity) DESC) AS rank
    FROM users
    JOIN orders ON users.user_id = orders.user_id
    JOIN order_items ON orders.order_id = order_items.order_id
    JOIN products ON order_items.product_id = products.product_id
    GROUP BY orders.order_id
) ranked_orders WHERE rank = 1;

-- 9. Liet ke moi user chi chon ra 1 don hang co gia tien nho nhat
SELECT user_id, user_name, order_id, tong_tien FROM (
    SELECT users.user_id, users.user_name, orders.order_id, SUM(products.product_price * order_items.quantity) AS tong_tien,
           RANK() OVER (PARTITION BY users.user_id ORDER BY SUM(products.product_price * order_items.quantity) ASC) AS rank
    FROM users
    JOIN orders ON users.user_id = orders.user_id
    JOIN order_items ON orders.order_id = order_items.order_id
    JOIN products ON order_items.product_id = products.product_id
    GROUP BY orders.order_id
) ranked_orders WHERE rank = 1;

-- 10. Liet ke moi user chi chon ra 1 don hang co so san pham lon nhat
SELECT user_id, user_name, order_id, so_san_pham FROM (
    SELECT users.user_id, users.user_name, orders.order_id, COUNT(order_items.product_id) AS so_san_pham,
           RANK() OVER (PARTITION BY users.user_id ORDER BY COUNT(order_items.product_id) DESC) AS rank
    FROM users
    JOIN orders ON users.user_id = orders.user_id
    JOIN order_items ON orders.order_id = order_items.order_id
    GROUP BY orders.order_id
) ranked_orders WHERE rank = 1;