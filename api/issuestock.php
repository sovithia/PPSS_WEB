<?php
function issueStocks($items,$author,$note,$locid)
{ 
        
    $db = getDatabase();
    $author = blueUser($author);
    
    $now = date("Y-m-d H:i:s");
    $nowdate = date("Y-m-d");

    $sql = "SELECT num2 FROM SYSDATA where sysid = 'IC'";
	$req = $db->prepare($sql);
	$req->execute(array());	
	$num2 = $req->fetch(PDO::FETCH_ASSOC)["num2"];
	$newID = intval($num2);
	$docnum = sprintf("IS%013d",$newID);

    

    $totalamount = 0;
    foreach($items as $item){    
        $sql = "SELECT TOP(1)TRANCOST FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY LOCID DESC ";
        $req = $db->prepare($sql);
        $req->execute(array($item["PRODUCTID"]));
        $itemDetailLastReceive = $req->fetch(PDO::FETCH_ASSOC);
        $THEQUANTITY = $item["QUANTITY"];
        $totalamount += ($itemDetailLastReceive["TRANCOST"]??"0") * $THEQUANTITY;       
     }
    $DOCNUM = $docnum;
    $FLOCID = $locid;
    $TLOCID = "";
    $REFERENCE = $note;
    $TRANDATE = $now;
    $TRANTYPE = "I";
    $TOTAL_AMT = $totalamount * -1;
    $PCNAME = "APPLICATION";
    $CURRID = "USD";
    $CURR_RATE = "1";
    $CUSTID = "";
    $VENDID = "";
    $DISC_PERCENT = 0;
    $VAT_PERCENT = 0;
    $APPLID = "IC";
    $FILEID = "";
    $TOFILEID = "";
    $IS_CHANGE_AVGCOST = "";
    $REF_DOCUMENT = "";
    $IS_PROCESS = "";
    $POSSTAT = "";
    $RECEIVENO = "";
    $CHANGE_REWARD = "";
    $TOTAL_STOCKREWARD = 0;
    $TOTAL_MONEYREWARD = 0;
    $ARACC = "";
    $BASECURR_ID = "USD";
    $CURRENCY_AMOUNT = $totalamount * -1; 
    $PURPOSE_ISSUE = "";
    $JOB_ID = "";
    $USERADD = $author;


    $sql = "INSERT INTO ICTRANHEADER(
        DOCNUM,FLOCID,TLOCID,REFERENCE,TRANDATE,
        TRANTYPE,TOTAL_AMT,PCNAME,CURRID,CURR_RATE,
        CUSTID,VENDID,DISC_PERCENT,VAT_PERCENT,APPLID,
        FILEID,TOFILEID,IS_CHANGE_AVGCOST,REF_DOCUMENT,IS_PROCCESS,        
        POSSTAT,RECEIVENO,CHANGE_REWARD,TOTAL_STOCKREWARD,TOTAL_MONEYREWARD,
        ARACC,BASECURR_ID,CURRENCY_AMOUNT, PURPOSE_ISSUE, JOB_ID,  
        USERADD,DATEADD)
        VALUES (?,?,?,?,?,
              ?,?,?,?,?,
              ?,?,?,?,?,
              ?,?,?,?,?,
              ?,?,?,?,?,
              ?,?,?,?,?,
              ?,GETDATE())";

    $req = $db->prepare($sql);
    $req->execute(array(
        $DOCNUM,$FLOCID,$TLOCID,$REFERENCE,$TRANDATE,
        $TRANTYPE,$TOTAL_AMT,$PCNAME,$CURRID,$CURR_RATE,
        $CUSTID,$VENDID,$DISC_PERCENT,$VAT_PERCENT,$APPLID,
        $FILEID,$TOFILEID,$IS_CHANGE_AVGCOST,$REF_DOCUMENT,$IS_PROCESS,
        $POSSTAT,$RECEIVENO,$CHANGE_REWARD,$TOTAL_STOCKREWARD,$TOTAL_MONEYREWARD,
        $ARACC,$BASECURR_ID,$CURRENCY_AMOUNT,$PURPOSE_ISSUE,$JOB_ID,$USERADD
    ));    

    
    $line = 1;
    foreach($items as $item)
    {    
        $THEQUANTITY = $item["QUANTITY"];

        $sql = "SELECT PRODUCTNAME,PRODUCTNAME1,CATEGORYID,CLASSID,STKUM,PRICE,ONHAND FROM ICPRODUCT WHERE PRODUCTID = ?";
        $req = $db->prepare($sql);
        $req->execute(array($item["PRODUCTID"]));
        $itemDetail = $req->fetch(PDO::FETCH_ASSOC);

        $sql = "SELECT TOP(1)TRANDISC,TRANCOST,VAT_PERCENT FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY LOCID DESC ";
        $req = $db->prepare($sql);
        $req->execute(array($item["PRODUCTID"]));
        $itemDetailLastReceive = $req->fetch(PDO::FETCH_ASSOC);

        $DOCNUM = $docnum;
        $PRODUCTID = $item["PRODUCTID"];
        $LOCID = $locid;
        $CATEGORYID = $itemDetail["CATEGORYID"];
        $CLASSID = $itemDetail["CLASSID"];
        $BATCHNO = "";
        $SERIAL = "";
        $TIERID = "";
        $TRANDATE = $now;
        $TRANTYPE = "I";
        $LINENUM = $line;
        $PRODUCTNAME = $itemDetail["PRODUCTNAME"];;
        $PRODUCTNAME1 = $itemDetail["PRODUCTNAME1"];
        $REFERENCE = $note; 
        $COMMENT = ""; 
        $TRANQTY = $item["QUANTITY"] * -1;
        $TRANUNIT = $itemDetail["STKUM"];
        $TRANFACTOR = 1;
        $STKUNIT = $itemDetail["STKUM"];;
        $STKFACTOR = 1; 
        $TRANDISC = $itemDetailLastReceive["TRANDISC"] ?? 0;
        $TRANTAX = 0;
        $TRANCOST = $itemDetailLastReceive["TRANCOST"] ?? 0;
        $TRANPRICE = $itemDetail["PRICE"];
        $PRICE_ORI = $itemDetail["PRICE"];
        
        $EXTPRICE = ($itemDetail["PRICE"] * $THEQUANTITY) * -1;
        if (isset($itemDetailLastReceive["TRANCOST"]))
            $EXTCOST =  ($itemDetailLastReceive["TRANCOST"] * $THEQUANTITY) * -1;
        else
            $EXTCOST = 0;
        $CURRENTONHAND = $itemDetail["ONHAND"];    
        $CURRID = "USD";
        $CURR_RATE = 1;
        $CUSTID = "";
        $VENDID = "";    

        $WEIGHT = 1;
        $OLDWEIGHT = 1;
        $APPLID = "IC";
        $CURRENTCOST = $itemDetailLastReceive["TRANCOST"] ?? 0;
        $LASTCOST = $itemDetailLastReceive["TRANCOST"] ?? 0;
        $COST_ADD = 0;
        $COST_RIEL = 0;
        $LINK_LINE = $line - 1;
        $ICCLEARING_ACC = "87000";
        $INVENTORY_ACC = "17000";
        $COSG_ACC = "";
        $DIMENSION = 1;
        $FILEID = "";
        $IS_CHANGE_AVGCOST = "";
        $WASTE_QTY = 0;
        $PRODUCT_PRODUCTID = "";
        $IS_PROCCESS = "";
        $EXPIRED_DATE = date('Y-m-d', 0);
        $TRANQTY_NEW = $item["QUANTITY"] * -1; 
        $TRANCOST_NEW = $itemDetailLastReceive["TRANCOST"] ?? 0;
        if($itemDetailLastReceive["TRANCOST"])
            $TRANEXTCOST_NEW = ($itemDetailLastReceive["TRANCOST"] * $THEQUANTITY) * -1 ;
        else
            $TRANEXTCOST_NEW = "0";
        $LINE_DISCAMT = 0; // ??
        $COST_CENTER = "";
        $LINE_NOTE = "";
        $CASE_PRODUCTID = "";
        $CASE_QTY = 0;
        $POSSTAT = "";
        $DECL1 = 0;
        $FOB = 0;
        $FREIGHT = 0;
        $INSUR = 0;
        $DECL2 = 0;
        $DUTY_VAT = 0;
        $MCC_EXP = 0;
        $LDC = 0;
        $FREIGHT_SG = 0;
        $INSUR_SG = 0;
        $RECEIVENO = '';
        $OTHER_PRICE = 0;
        $PO_COLID = 0;
        $RETURN_DATE = date('Y-m-d', 0);
        $BORROW_NUMBER = "";
        $CHANGE_REWARD = "";
        $MONEY_REWARD = 0;
        $IS_MONEY_REWARD = "";
        $PACK_RECEIVE = 0;
        $PACK_UNIT = "";
        $REWARD_UNIT = "";
        $COST_METHOD = "AG";
        $BASECURR_ID = "USD";
        if (isset($itemDetailLastReceive["TRANCOST"]))
            $CURRENCY_AMOUNT = ($itemDetailLastReceive["TRANCOST"] * $THEQUANTITY) * -1;
        else 
            $CURRENCY_AMOUNT = 0;
        $CURRENCY_COST = $itemDetailLastReceive["TRANCOST"] ?? "0";
        $CURRENCY_COST_ADD = 0;
        $CURRENCY_EXTPRICE = ($itemDetail["PRICE"] * $THEQUANTITY) * -1;
        $CURRENCY_PRICE = $itemDetail["PRICE"];
        $FF_LF_INDEX = 0;
        $PURPOSE_ISSUE = "";
        $JOB_ID = "";
        $ROW_ID = 0;
        $MAIN_PRODUCTID = $item["PRODUCTID"];
        $USERADD = $author;
        $DATEADD = $now;
        $USEREDIT = "";
        $DATEEDIT = null;
        $sql = "INSERT INTO ICTRANDETAIL (
                DOCNUM,PRODUCTID,LOCID,CATEGORYID,CLASSID,
                BATCHNO,SERIAL,TIERID,TRANDATE,TRANTYPE,
                LINENUM,PRODUCTNAME,PRODUCTNAME1,REFERENCE,COMMENT,                
                TRANQTY,TRANUNIT,TRANFACTOR,STKUNIT,STKFACTOR,
                TRANDISC,TRANTAX,TRANCOST,TRANPRICE,PRICE_ORI,
                EXTPRICE,EXTCOST,CURRENTONHAND,CURRID,CURR_RATE,
                CUSTID,VENDID,WEIGHT,OLDWEIGHT,APPLID,
                CURRENTCOST,LASTCOST,COST_ADD,COST_RIEL,LINK_LINE,
                ICCLEARING_ACC,INVENTORY_ACC,COSG_ACC,DIMENSION,FILEID,
                IS_CHANGE_AVGCOST,WASTE_QTY,PRODUCT_PRODUCTID,IS_PROCCESS,EXPIRED_DATE,
                TRANQTY_NEW,TRANCOST_NEW,TRANEXTCOST_NEW,LINE_DISCAMT,COST_CENTER,                
                LINE_NOTE,CASE_PRODUCTID,CASE_QTY,POSSTAT,DECL1,
                FOB,FREIGHT,INSUR,DECL2,DUTY_VAT,
                MCC_EXP,LDC,FREIGHT_SG,INSUR_SG,RECEIVENO,
                OTHER_PRICE,PO_COLID,RETURN_DATE,BORROW_NUMBER,CHANGE_REWARD,
                MONEY_REWARD,IS_MONEY_REWARD,PACK_RECEIVE,PACK_UNIT,REWARD_UNIT,
                COST_METHOD,BASECURR_ID,CURRENCY_AMOUNT,CURRENCY_COST,CURRENCY_COST_ADD,
                CURRENCY_EXTPRICE,CURRENCY_PRICE,FF_LF_INDEX,PURPOSE_ISSUE,JOB_ID,

                ROW_ID,MAIN_PRODUCTID,USERADD,DATEADD,USEREDIT,
                DATEEDIT) 
                VALUES (
                        ?,?,?,?,?,
                        ?,?,?,?,?,
                        ?,?,?,?,?,
                        ?,?,?,?,?,
                        ?,?,?,?,?,
                        ?,?,?,?,?,
                        ?,?,?,?,?,
                        ?,?,?,?,?,
                        ?,?,?,?,?,
                        ?,?,?,?,?,
                        ?,?,?,?,?,
                        ?,?,?,?,?,
                        ?,?,?,?,?,
                        ?,?,?,?,?,
                        ?,?,?,?,?,
                        ?,?,?,?,?,
                        ?,?,?,?,?,
                        ?,?,?,?,?,
                        ?,?,?,?,?,
                        ?
                )";
        $req = $db->prepare($sql);

        $req->execute(array(
            $DOCNUM,$PRODUCTID,$LOCID,$CATEGORYID,$CLASSID,
            $BATCHNO,$SERIAL,$TIERID,$TRANDATE,$TRANTYPE,
            $LINENUM,$PRODUCTNAME,$PRODUCTNAME1,$REFERENCE,$COMMENT,
            $TRANQTY,$TRANUNIT,$TRANFACTOR,$STKUNIT,$STKFACTOR,
            $TRANDISC,$TRANTAX,$TRANCOST,$TRANPRICE,$PRICE_ORI,
            $EXTPRICE,$EXTCOST,$CURRENTONHAND,$CURRID,$CURR_RATE,
            $CUSTID,$VENDID,$WEIGHT,$OLDWEIGHT,$APPLID,
            $CURRENTCOST,$LASTCOST,$COST_ADD,$COST_RIEL,$LINK_LINE,
            $ICCLEARING_ACC,$INVENTORY_ACC,$COSG_ACC,$DIMENSION,$FILEID,
            $IS_CHANGE_AVGCOST,$WASTE_QTY,$PRODUCT_PRODUCTID,$IS_PROCCESS,$EXPIRED_DATE,
            $TRANQTY_NEW,$TRANCOST_NEW,$TRANEXTCOST_NEW,$LINE_DISCAMT,$COST_CENTER,
            $LINE_NOTE,$CASE_PRODUCTID,$CASE_QTY,$POSSTAT,$DECL1,
            $FOB,$FREIGHT,$INSUR,$DECL2,$DUTY_VAT,
            $MCC_EXP,$LDC,$FREIGHT_SG,$INSUR_SG,$RECEIVENO,
            $OTHER_PRICE,$PO_COLID,$RETURN_DATE,$BORROW_NUMBER,$CHANGE_REWARD,
            $MONEY_REWARD,$IS_MONEY_REWARD,$PACK_RECEIVE,$PACK_UNIT,$REWARD_UNIT,
            $COST_METHOD,$BASECURR_ID,$CURRENCY_AMOUNT,$CURRENCY_COST,$CURRENCY_COST_ADD,
            $CURRENCY_EXTPRICE,$CURRENCY_PRICE,$FF_LF_INDEX,$PURPOSE_ISSUE,$JOB_ID,
            $ROW_ID,$MAIN_PRODUCTID,$USERADD,$DATEADD,$USEREDIT,
            $DATEEDIT

        ));



       
        $sql = "UPDATE ICPRODUCT set ONHAND = ONHAND - ?,TOTALUSE = TOTALUSE + ? WHERE PRODUCTID = ?";
        $req = $db->prepare($sql);
        $req->execute(array($THEQUANTITY,$THEQUANTITY,$item["PRODUCTID"]));
       
        
        $sql = "UPDATE ICLOCATION set LOCONHAND = LOCONHAND - ?,TOTALUSE = TOTALUSE + ?,LASTUSE = ? 
                WHERE LOCID = ? AND PRODUCTID = ?";
        $req = $db->prepare($sql);  
        $req->execute(array($THEQUANTITY,$THEQUANTITY,$now,$LOCID,$item["PRODUCTID"]));
    
        $line++; 
    }
    $sql = "SELECT GLNO FROM GLSYS";
    $req = $db->prepare($sql);
    $req->execute(array());
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $GLNUM = $res["GLNO"];

    $sql = "UPDATE GLSYS set GLNO = GLNO + 1";
    $req = $db->prepare($sql);
    $req->execute(array());
    $theGLNO = date('y').date('m')."00000".$GLNUM;


    $GLNO = $theGLNO;
    $LINNO = 1;
    $GLDESC = "Issue";
    $GLDATE = $nowdate;
    $GLYEAR = date("Y");
    $GLMONTH = date("m"); 
    $ACCNO = 87000;
    $GLAMT = round($totalamount,4);
    $DEBIT = round($totalamount,4);
    $CREDIT = 0;
    $DOCNO = $docnum;
    $USERADD = $author;
    $DATEADD = $now;
    $GLPOST = "N";
    $GLTYPE = "J";
    $APPID = "IC";
    $REMARKS = $note;
    $CUSTID = null;
    $VENDID = null;
    $FILEID = "";
    $COST_CENTER = null;
    $IS_UPDATED = null;
    $LOCID = $locid;
    $CLEAR_AMOUNT = 0;
    $OTHER_PRICE = 0;
    $LINK_LINE = 0;

    $sql = "INSERT INTO GLTRAN (
    GLNO,LINNO,GLDESC,GLDATE,GLYEAR,
    GLMONTH,ACCNO,GLAMT,DEBIT,CREDIT,
    DOCNO,USERADD,DATEADD,GLPOST,GLTYPE,
    APPID,REMARKS,CUSTID,VENDID,FILEID,
    COST_CENTER,IS_UPDATED,LOCID,CLEAR_AMOUNT,OTHER_PRICE,
    LINK_LINE
    ) 
    VALUES (
    ?,?,?,?,?,
    ?,?,?,?,?,
    ?,?,?,?,?,
    ?,?,?,?,?,
    ?,?,?,?,?,
    ?)";
    $req = $db->prepare($sql);
    $req->execute(array(
        $GLNO,$LINNO,$GLDESC,$GLDATE,$GLYEAR,
        $GLMONTH,$ACCNO,$GLAMT,$DEBIT,$CREDIT,
        $DOCNO,$USERADD,$DATEADD,$GLPOST,$GLTYPE,
        $APPID,$REMARKS,$CUSTID,$VENDID,$FILEID,
        $COST_CENTER,$IS_UPDATED,$LOCID,$CLEAR_AMOUNT,$OTHER_PRICE,
        $LINK_LINE

    ));



    $GLNO = $theGLNO;
    $LINNO = 2;
    $GLDESC = "Issue";
    $GLDATE = $nowdate;
    $GLYEAR = date("Y");
    $GLMONTH = date("m");
    $ACCNO = "17000";
    $GLAMT = round($totalamount,4);
    $DEBIT = 0;
    $CREDIT = round($totalamount,4);
    $DOCNO = $docnum;
    $USERADD = $author;
    $DATEADD = $now;
    $APPID = "IC";
    $REMARKS = $note;
    $CUSTID = null;
    $VENDID = null;
    $FILEID = "";
    $COST_CENTER = null;
    $IS_UPDATED = null;
    $LOCID = $locid;
    $CLEAR_AMOUNT = 0;
    $OTHER_PRICE = 0;
    $LINK_LINE = 0;

    $sql = "INSERT INTO GLTRAN(
    GLNO,LINNO,GLDESC,GLDATE,GLYEAR,
    GLMONTH,ACCNO,GLAMT,DEBIT,CREDIT,
    DOCNO,USERADD,DATEADD,APPID,REMARKS,
    CUSTID,VENDID,FILEID,COST_CENTER,IS_UPDATED,
    LOCID,CLEAR_AMOUNT,OTHER_PRICE,LINK_LINE) 
    VALUES (
        ?,?,?,?,?,
        ?,?,?,?,?,
        ?,?,?,?,?,
        ?,?,?,?,?,
        ?,?,?,?)
    ";
     $req = $db->prepare($sql);
     $req->execute(array(
        $GLNO,$LINNO,$GLDESC,$GLDATE,$GLYEAR,
        $GLMONTH,$ACCNO,$GLAMT,$DEBIT,$CREDIT,
        $DOCNO,$USERADD,$DATEADD,$APPID,$REMARKS,
        $CUSTID,$VENDID,$FILEID,$COST_CENTER,$IS_UPDATED,
        $LOCID,$CLEAR_AMOUNT,$OTHER_PRICE,$LINK_LINE
     ));

    $sql = "UPDATE SYSDATA SET NUM1=NUM1+1 WHERE ltrim(rtrim(SYSID))='AR'";
    $req = $db->prepare($sql);
    $req->execute(array());
    

    $sql = "UPDATE SYSDATA SET NUM2=NUM2+1 WHERE ltrim(rtrim(SYSID))='IC'";
    $req = $db->prepare($sql);
    $req->execute(array());
        
    return $DOCNUM;
} 
?>