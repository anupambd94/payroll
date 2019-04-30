$setAutoId = $conn->query("SET @autoid :=0");
          $updateId = $conn->query("UPDATE employee SET emp_id = @autoid := (@autoid+1)");
          $reset = $conn->query("ALTER TABLE employee AUTO_INCREMENT = '1'");