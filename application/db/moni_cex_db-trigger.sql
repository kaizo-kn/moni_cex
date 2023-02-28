
/*insert*/
DELIMITER $$
CREATE TRIGGER insert_up_dokumen
   AFTER INSERT
    ON uraian_pekerjaan
    FOR EACH ROW 
BEGIN
    INSERT INTO `dokumen`(`id_pekerjaan`) VALUES (NEW.id_pekerjaan);
END$$
DELIMITER ;



DELIMITER $$
CREATE TRIGGER insert_up_persentase
   AFTER INSERT
    ON uraian_pekerjaan
    FOR EACH ROW 
BEGIN
   INSERT INTO `persentase_progress`(`id_pekerjaan`,`tanggal`, `persentase`) VALUES (NEW.id_pekerjaan,NEW.tanggal,0);
END$$
DELIMITER ;


DELIMITER $$
CREATE TRIGGER insert_up_dokumentasi
   AFTER INSERT
    ON uraian_pekerjaan
    FOR EACH ROW 
BEGIN
   INSERT INTO `dokumentasi`(`id_pekerjaan`) VALUES (NEW.id_pekerjaan);
END$$
DELIMITER ;



/*delete*/
DELIMITER $$
CREATE TRIGGER delete_up_dokumen
   AFTER DELETE
    ON uraian_pekerjaan
    FOR EACH ROW 
BEGIN
DELETE FROM  `dokumen` WHERE `id_pekerjaan` = OLD.id_pekerjaan;
END$$
DELIMITER ;



DELIMITER $$
CREATE TRIGGER delete_up_persentase
   AFTER DELETE
    ON uraian_pekerjaan
    FOR EACH ROW 
BEGIN
   DELETE FROM `persentase_progress` WHERE `id_pekerjaan` = OLD.id_pekerjaan;
END$$
DELIMITER ;


DELIMITER $$
CREATE TRIGGER delete_up_dokumentasi
   AFTER DELETE
    ON uraian_pekerjaan
    FOR EACH ROW 
BEGIN
   DELETE FROM `dokumentasi` WHERE `id_pekerjaan` = OLD.id_pekerjaan;
END$$
DELIMITER ;

/*change on persentase_progress*/
DELIMITER $$
CREATE TRIGGER update_persentase_up
   AFTER UPDATE
    ON persentase_progress
    FOR EACH ROW 
BEGIN
   UPDATE `uraian_pekerjaan` SET `max_persentase` = (SELECT MAX(persentase) FROM `persentase_progress` WHERE id_pekerjaan = OLD.id_pekerjaan) WHERE `id_pekerjaan` = OLD.id_pekerjaan;
END$$
DELIMITER ;

