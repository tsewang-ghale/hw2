<?php
function selectCompanies() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT company_id, company_name, company_foundation_year, company_ceo FROM Companies");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function insertCompany($company_name, $company_foundation_year, $company_ceo) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO Companies (company_name, company_foundation_year, company_ceo) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $company_name, $company_foundation_year, $company_ceo);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function updateCompany($company_id, $company_name, $company_foundation_year, $company_ceo) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE Companies SET company_name = ?, company_foundation_year = ?, company_ceo = ? WHERE company_id = ?");
        if (!$stmt) {
            throw new Exception("Failed to prepare statement: " . $conn->error);
        }
        $stmt->bind_param("sisi", $company_name, $company_foundation_year, $company_ceo, $company_id);
        $success = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        if ($conn) {
            $conn->close();
        }
        throw $e;
    }
}

function deleteCompany($company_id) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("DELETE FROM Companies WHERE company_id = ?");
        $stmt->bind_param("i", $company_id);
        $success = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
