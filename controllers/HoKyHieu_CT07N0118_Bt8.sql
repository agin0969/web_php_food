 
CREATE DATABASE QLTKNH;
Use QLTKNH;
-- Tạo bảng KHACHHANG
CREATE TABLE KHACHHANG (
    makh INT PRIMARY KEY,
    tenkh VARCHAR(255),
    đckh VARCHAR(255),
    đtkh VARCHAR(15)
);
-- Tạo bảng TAIKHOAN
CREATE TABLE TAIKHOAN (
    matk INT PRIMARY KEY,
    sodu DECIMAL(18, 2),
    soduco DECIMAL(18, 2),
    soduno DECIMAL(18, 2),
    makh INT,
    FOREIGN KEY (makh) REFERENCES KHACHHANG(makh)
);
-- Tạo bảng GIAODICH
CREATE TABLE GIAODICH (
    magd INT PRIMARY KEY,
    ngaygd DATE,
    tkno INT,
    tkco INT,
    sotien DECIMAL(18, 2),
    FOREIGN KEY (tkno) REFERENCES TAIKHOAN(matk),
    FOREIGN KEY (tkco) REFERENCES TAIKHOAN(matk)
);
 -- Thêm dữ liệu vào bảng KHACHHANG
INSERT INTO KHACHHANG (makh, tenkh, đckh, đtkh)
VALUES 
    (1, 'Nguyễn Văn A', '123 Đường ABC, Quận XYZ, Thành phố HCM', '0123456789'),
    (2, 'Trần Thị B', '456 Đường DEF, Quận UVW, Thành phố HCM', '0987654321');

-- Thêm dữ liệu vào bảng TAIKHOAN
INSERT INTO TAIKHOAN (matk, sodu, soduco, soduno, makh)
VALUES
    (101, 50000000.00, 50000000.00, 0.00, 1),
    (102, 10000000.00, 10000000.00, 0.00, 2);

 
-- a. Thủ tục gửi tiền
CREATE PROCEDURE GuiTien
    @matk INT,
    @sotien DECIMAL(18,2)
AS
BEGIN
    BEGIN TRANSACTION;
    IF NOT EXISTS (SELECT 1 FROM TAIKHOAN WHERE matk = @matk)
    BEGIN
        ROLLBACK TRANSACTION;
        SELECT 'Tài khoản không tồn tại.';
        RETURN;
    END
    DECLARE @magd INT; -- Khai báo một biến để lưu trữ giá trị của cột magd

    DECLARE @sodu DECIMAL(18,2);
    SELECT @sodu = sodu FROM TAIKHOAN WHERE matk = @matk;
    
    IF @sotien > 0
    BEGIN
        BEGIN TRY
            -- Tạo một giá trị mới cho cột magd, có thể là một số ngẫu nhiên hoặc một giá trị duy nhất từ một chuỗi
            SET @magd = (SELECT ISNULL(MAX(magd), 0) + 1 FROM GIAODICH);

            UPDATE TAIKHOAN
            SET sodu = sodu + @sotien,
                soduco = soduco + @sotien
            WHERE matk = @matk;
            
            INSERT INTO GIAODICH(ngaygd, magd, tkno, tkco, sotien) -- Thêm giá trị của biến @magd vào cột magd
            VALUES (GETDATE(), @magd, NULL, @matk, @sotien); -- Thêm giá trị của biến @magd vào cột magd
            
            COMMIT TRANSACTION;
            SELECT 'Gửi tiền thành công.';
        END TRY
        BEGIN CATCH
            ROLLBACK TRANSACTION;
            SELECT 'Gửi tiền thất bại. Lỗi: ' + ERROR_MESSAGE();
        END CATCH;
    END
    ELSE
    BEGIN
        ROLLBACK TRANSACTION;
        SELECT 'Số tiền gửi phải lớn hơn 0.';
    END;
END;

 EXEC GuiTien @matk = 101, @sotien = 500000; -- Gửi 500.000 đồng vào tài khoản có mã số 101
 -- b. Thủ tục rút tiền
CREATE PROCEDURE RutTien
    @matk INT,
    @sotien DECIMAL(18,2)
AS
BEGIN
    BEGIN TRANSACTION;
    IF NOT EXISTS (SELECT 1 FROM TAIKHOAN WHERE matk = @matk)
    BEGIN
        ROLLBACK TRANSACTION;
        SELECT 'Tài khoản không tồn tại.';
        RETURN;
    END

    DECLARE @magd INT; -- Khai báo một biến để lưu trữ giá trị của cột magd

    DECLARE @sodu DECIMAL(18,2);
    SELECT @sodu = sodu FROM TAIKHOAN WHERE matk = @matk;
    
    IF @sotien > 0 AND @sotien <= @sodu
    BEGIN
        BEGIN TRY
            -- Tạo một giá trị mới cho cột magd, có thể là một số ngẫu nhiên hoặc một giá trị duy nhất từ một chuỗi
            SET @magd = (SELECT ISNULL(MAX(magd), 0) + 1 FROM GIAODICH);

            UPDATE TAIKHOAN
            SET sodu = sodu - @sotien,
                soduno = soduno + @sotien
            WHERE matk = @matk;
            
            INSERT INTO GIAODICH(ngaygd, magd, tkno, tkco, sotien) -- Thêm giá trị của biến @magd vào cột magd
            VALUES (GETDATE(), @magd, @matk, NULL, @sotien); -- Thêm giá trị của biến @magd vào cột magd
            
            COMMIT TRANSACTION;
            SELECT 'Rút tiền thành công.';
        END TRY
        BEGIN CATCH
            ROLLBACK TRANSACTION;
            SELECT 'Rút tiền thất bại. Lỗi: ' + ERROR_MESSAGE();
        END CATCH;
    END
    ELSE
    BEGIN
        ROLLBACK TRANSACTION;
        SELECT 'Số tiền rút phải lớn hơn 0 và không vượt quá số dư.';
    END;
END;
 EXEC RutTien @matk = 102, @sotien = 1000000; -- Rút 1.000.000 đồng từ tài khoản có mã số 102

-- c. Thủ tục chuyển tiền
CREATE PROCEDURE ChuyenTien
    @matk_gui INT,
    @matk_nhan INT,
    @sotien DECIMAL(18,2)
AS
BEGIN
    BEGIN TRANSACTION;
     IF NOT EXISTS (SELECT 1 FROM TAIKHOAN WHERE matk = @matk_gui) OR
       NOT EXISTS (SELECT 1 FROM TAIKHOAN WHERE matk = @matk_nhan)
    BEGIN
        ROLLBACK TRANSACTION;
        SELECT 'Một trong hai tài khoản không tồn tại.';
        RETURN;
    END
    DECLARE @magd INT; -- Khai báo một biến để lưu trữ giá trị của cột magd

    DECLARE @sodu_gui DECIMAL(18,2), @sodu_nhan DECIMAL(18,2);
    SELECT @sodu_gui = sodu FROM TAIKHOAN WHERE matk = @matk_gui;
    SELECT @sodu_nhan = sodu FROM TAIKHOAN WHERE matk = @matk_nhan;
    
    IF @sotien > 0 AND @sotien <= @sodu_gui
    BEGIN
        BEGIN TRY
            -- Tạo một giá trị mới cho cột magd, có thể là một số ngẫu nhiên hoặc một giá trị duy nhất từ một chuỗi
            SET @magd = (SELECT ISNULL(MAX(magd), 0) + 1 FROM GIAODICH);

            UPDATE TAIKHOAN
            SET sodu = sodu - @sotien,
                soduno = soduno + @sotien
            WHERE matk = @matk_gui;
            
            UPDATE TAIKHOAN
            SET sodu = sodu + @sotien,
                soduco = soduco + @sotien
            WHERE matk = @matk_nhan;
            
            INSERT INTO GIAODICH(ngaygd, magd, tkno, tkco, sotien) -- Thêm giá trị của biến @magd vào cột magd
            VALUES (GETDATE(), @magd, @matk_gui, @matk_nhan, @sotien); -- Thêm giá trị của biến @magd vào cột magd
            
            COMMIT TRANSACTION;
            SELECT 'Chuyển tiền thành công.';
        END TRY
        BEGIN CATCH
            ROLLBACK TRANSACTION;
            SELECT 'Chuyển tiền thất bại. Lỗi: ' + ERROR_MESSAGE();
        END CATCH;
    END
    ELSE
    BEGIN
        ROLLBACK TRANSACTION;
        SELECT 'Số tiền chuyển phải lớn hơn 0 và không vượt quá số dư.';
    END;
END;
EXEC ChuyenTien @matk_gui = 101, @matk_nhan = 102, @sotien = 2000000; -- Chuyển 2.000.000 đồng từ tài khoản 101 sang tài khoản 102
