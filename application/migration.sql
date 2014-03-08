/* Migration up */
CREATE TABLE lime_llous (
  `id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT, 
  `name` VARCHAR(255) NOT NULL, 
  `llou1_code` VARCHAR(20),
  `llou2_code` VARCHAR(20),
  `agency_code` VARCHAR(20),
  `department_code` VARCHAR(20),
  INDEX `indx_agency` (`agency_code`),
  INDEX `indx_dept` (`department_code`)
);


/* Migration down */
DROP TABLE lime_llous;