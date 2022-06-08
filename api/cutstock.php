<?php 


function issueStocks($items,$author,$note,$locid)
{
    $author = blueUser($author);
    $db = getDatabase();
    $now = date("Y-m-d H:i:s");
    $nowdate = date("Y-m-d");

    $totalamount = 0;
    foreach($items as $item){        
        // Calculate Total Amount
    }
    $DOCNUM;
    $FLOCID = $locid;
    $TLOCID = "";
    $REFERENCE = $note;
    $TRANDATE = $now;
    $TRANTYPE = "I";
    $TOTAL_AMT = $totalamount;
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
    $CURRENCY_AMOUNT = ""; // ?? 
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

    $db->prepare($sql);
    $req = $db->execute(array(
        $DOCNUM,$FLOCID,$TLOCID,$REFERENCE,$TRANDATE,
        $TRANTYPE,$TOTAL_AMT,$PCNAME,$CURRID,$CURR_RATE,
        $CUSTID,$VENDID,$DISC_PERCENT,$VAT_PERCENT,$APPLID,
        $FILEID,$TOFILEID,$IS_CHANGE_AVGCOST,$REF_DOCUMENT,$IS_PROCESS,
        $POSSTAT,$RECEIVENO,$CHANGE_REWARD,$TOTAL_STOCKREWARD,$TOTAL_MONEYREWARD,
        $ARACC,$BASECURR_ID,$CURRENCY_AMOUNT,$PURPOSE_ISSUE,$JOB_ID,$USERADD
    ));


/*
    + INSERT INTO [ICTRANHEADER]
    ([DOCNUM],     => “IS” 13 Digit 
    [FLOCID],     => Location ISSUE
    [TLOCID],     => Blank
    [REFERENCE],    => Note 
    [TRANDATE],     => GetDate
    [TRANTYPE],     => “I”
    [TOTAL_AMT],    => Total amount ISSUE 
    [PCNAME],     => PC ISSUE
    [CURRID],     => “USD”
    [CURR_RATE],    => 1
    [CUSTID],     => Blank
    [VENDID],     => Blank
    [DISC_PERCENT],    => 0
    [VAT_PERCENT],    => 0
    [APPLID],     => IC

    [FILEID],      => Blank
    [TOFILEID],     => Blank
    [IS_CHANGE_AVGCOST],  => Blank
    [REF_DOCUMENT],   => Blank
    [IS_PROCCESS],    => Blank


    [POSSTAT],     => Blank
    [RECEIVENO],    => Blank
    [CHANGE_REWARD],   => Blank
    [TOTAL_STOCKREWARD],  => 0
    [TOTAL_MONEYREWARD],  => 0


    [ARACC],     => Blank
    [BASECURR_ID],    => USD  
    [CURRENCY_AMOUNT],  => Total (Price * Qty) (-)
    [PURPOSE_ISSUE],   => Blank
    [JOB_ID],     => Blank

    [USERADD],     => User Add
    [DATEADD])      => GetDate
*/
$line = 1;
foreach($items as $item)
{
    $sql = "SELECT PRODUCTNAME,PRODUCTNAME1,CATEGORYID,CLASSID,STKUM,PRICE,ONHAND WHERE PRODUCTID = ?";
    $req = $db->prepare($sql);
    $req->execute(array($item["PRODUCTID"]));
    $itemDetail = $req->fetch(PDO::FETCH_ASSOC);

    $sql = "SELECT TOP(1)TRANDISC,TRANCOST,VAT_PERCENT FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY LOCID DESC ";
    $req = $db->prepare($sql);
    $req->execute(array($item["PRODUCTID"]));
    $itemDetailLastReceive = $req->fetch(PDO::FETCH_ASSOC);

    $DOCNUM;
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
    $REFERENCE = ""; //??
    $COMMENT = ""; //??
    $TRANQTY = $item["QUANTITY"];
    $TRANUNIT = $item["STKUM"];
    $TRANFACTOR = 1;
    $STKUNIT = $item["STKUM"];;
    $STKFACTOR = 1; 
    $TRANDISC = $itemDetailLastReceive["TRANDISC"];
    $TRANTAX = $itemDetailLastReceive["VATPERCENT"]; // 0 ??
    $TRANCOST = $itemDetailLastReceive["TRANCOST"];
    $TRANPRICE = $item["PRICE"];
    $PRICE_ORI = $item["PRICE"];
    
    $EXTPRICE = $itemDetail["PRICE"] * $item["QUANTITY"];
    $EXTCOST = itemDetailLastReceive["TRANCOST"] * $item["QUANTITY"];
    $CURRENTONHAND = $itemDetail["ONHAND"];    
    $CURRID = "USD";
    $CURR_RATE = 1;
    $CUSTID = "";
    $VENDID = "";    
    $WEIGHT = 1;
    $OLDWEIGHT = 1;
    $APPLID = "IC";
    $CURRENTCOST = $itemDetailLastReceive["TRANCOST"];
    $LASTCOST = $itemDetailLastReceive["TRANCOST"];
    $COST_ADD = 0;
    $COST_RIEL = 0;
    $LINK_LINE = $line;
    $ICCLEARING_ACC = "77000";
    $INVENTORY_ACC = "17000";
    $COSG_ACC = "Blank";
    $DIMENSION = 1;
    $FILEID = "";
    $IS_CHANGE_AVGCOST = "";
    $WASTE_QTY = 0;
    $PRODUCT_PRODUCTID = "";
    $IS_PROCCESS = "";
    $EXPIRED_DATE = null;
    $TRANQTY_NEW = $item["QUANTITY"];
    $TRANCOST_NEW = $itemDetailLastReceive["TRANCOST"];
    $TRANEXTCOST_NEW = itemDetailLastReceive["TRANCOST"] * $item["QUANTITY"];
    $LINE_DISCAMT = "";
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
    $RECEIVENO = 0;
    $OTHER_PRICE = 0;
    $PO_COLID = 0;
    $RETURN_DATE = null;
    $BORROW_NUMBER = "";
    $CHANGE_REWARD = "";
    $MONEY_REWARD = 0;
    $IS_MONEY_REWARD = "";
    $PACK_RECEIVE = 0;
    $PACK_UNIT = "";
    $REWARD_UNIT = "";
    $COST_METHOD = "AG";
    $BASECURR_ID = "USD";
    $CURRENCY_AMOUNT = itemDetailLastReceive["TRANCOST"] * $item["QUANTITY"];
    $CURRENCY_COST = itemDetailLastReceive["TRANCOST"];
    $CURRENCY_COST_ADD = 0;
    $CURRENCY_EXTPRICE = $itemDetail["PRICE"] * $item["QUANTITY"];
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
            ICCLEARING_ACC,INVENTORY_ACC,COSG_ACC,DIMENSION,FILEID
            IS_CHANGE_AVGCOST,WASTE_QTY,PRODUCT_PRODUCTID,IS_PROCCESS,EXPIRED_DATE,
            TRANQTY_NEW,TRANCOST_NEW,TRANEXTCOST_NEW,LINE_DISCAMT,COST_CENTER,
            LINE_NOTE,CASE_PRODUCTID,CASE_QTY,POSSTAT,DECL1,
            FOB,FREIGHT,INSUR,DECL2,DUTY_VAT,
            MCC_EXP,LDC,FREIGHT_SG,INSUR_SG,RECEIVENO,
            OTHER_PRICE,PO_COLID,RETURN_DATE,BORROW_NUMBER,CHANGE_REWARD,
            MONEY_REWARD,IS_MONEY_REWARD,PACK_RECEIVE,PACK_UNIT,REWARD_UNIT
            COST_METHOD,BASECURR_ID,CURRENCY_AMOUNT,CURRENCY_COST,CURRENCY_COST_ADD
            CURRENCY_EXTPRICE,CURRENCY_PRICE,FF_LF_INDEX,PURPOSE_ISSUE,JOB_ID
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
    /*
    + INSERT INTO [ICTRANDETAIL]
    ([DOCNUM],     => “IS” 13 Digit 
    [PRODUCTID],    => Productid
    [LOCID],      => Location ISSUE
    [CATEGORYID],    => Product Category
    [CLASSID],     => Class Product

    [BATCHNO],     => Blank
    [SERIAL],     => Blank
    [TIERID],      => Blank
    [TRANDATE],     =>  getDate
    [TRANTYPE],     => “I”

    [LINENUM],     => Number of iTems issue (Start 1 — — - )
    [PRODUCTNAME],   => Product Name En
    [PRODUCTNAME1],   => Product Name Kh
    [REFERENCE],    => Reference Issue
    [COMMENT],     => Comment By Line 


    [TRANQTY],     => Qty Issue (-)
    [TRANUNIT],     => Unit factor from ICProduct
    [TRANFACTOR],    => 1
    [STKUNIT],     =>  Unit factor from ICProduct
    [STKFACTOR],    => 1


    [TRANDISC],     => Discount of Item 
    [TRANTAX],     => 0
    [TRANCOST],     => Cost Item 
    [TRANPRICE],    => Selling Price Item  from ICProduct
    [PRICE_ORI],     => Selling Price Item  from ICProduct

    [EXTPRICE],     => Price * Qty (-)
    [EXTCOST],     => Cost * Qty (-)
    [CURRENTONHAND],   => Current Onhand
    [CURRID],     => “USD”
    [CURR_RATE],    => 1

    [CUSTID],     => Blank
    [VENDID],     => Blank
    [WEIGHT],     => 1
    [OLDWEIGHT],    => 1
    [APPLID],     => IC

    [CURRENTCOST],    => Current Cost
    [LASTCOST],     => Last Cost
    [COST_ADD],     => 0
    [COST_RIEL],     => 0
    [LINK_LINE],     =>  Number of iTems issue (Start 0  — — - )


    [ICCLEARING_ACC],   => 77000
    [INVENTORY_ACC],   => 17000
    [COSG_ACC],    => Blank
    [DIMENSION],    => 1
    [FILEID],      => Blank 

    [IS_CHANGE_AVGCOST],  => Blank
    [WASTE_QTY],    => 0
    [PRODUCT_PRODUCTID],  => Blank
    [IS_PROCCESS],    => Blank
    [EXPIRED_DATE],    => Default 

    [TRANQTY_NEW],    => Qty ISSUE(-)
    [TRANCOST_NEW],   => Cost ITem 
    [TRANEXTCOST_NEW],  => Cost * Qty (-)
    [LINE_DISCAMT],    => Blank
    [COST_CENTER],    => Blank

    [LINE_NOTE],     => Blank
    [CASE_PRODUCTID],   => Blank
    [CASE_QTY],     => 0
    [POSSTAT],     => Blank
    [DECL1],      => 0

    [FOB],      => 0
    [FREIGHT],     => 0
    [INSUR],      => 0
    [DECL2],      => 0
    [DUTY_VAT],     => 0

    [MCC_EXP],     => 0
    [LDC],      => 0
    [FREIGHT_SG],    => 0
    [INSUR_SG],     => 0
    [RECEIVENO],    => 0

    [OTHER_PRICE],    => 0
    [PO_COLID],     => 0
    [RETURN_DATE],    => Default
    [BORROW_NUMBER],   => Blank
    [CHANGE_REWARD],   => Blank

    [MONEY_REWARD],   => 0
    [IS_MONEY_REWARD],  => Blank
    [PACK_RECEIVE],    => 0
    [PACK_UNIT],    => Blank
    [REWARD_UNIT],    => Blank

    [COST_METHOD],    => AG
    [BASECURR_ID],    => USD
    [CURRENCY_AMOUNT],  => Cost * Qty (-)
    [CURRENCY_COST],   => Cost Item
    [CURRENCY_COST_ADD],  => 0

    [CURRENCY_EXTPRICE],  =>  Price * Qty (-)
    [CURRENCY_PRICE],   => Price Item
    [FF_LF_INDEX],    => 0
    [PURPOSE_ISSUE],   => Blank
    [JOB_ID],     => Blank

    [ROW_ID],     => 0
    [MAIN_PRODUCTID],   => ProductID
    [USERADD],      => User ISSUE
    [DATEADD])       => GETDATE()
    [USEREDIT]      => Blank
    [DATEEDIT]      => Null
    */

    $QUANTITY;
    $PRODUCTID;
    $LOCID;
    $sql = "UPDATE ICPRODUCT set ONHAND = ONHAND - ?,TOTALUSE = TOTALUSE + ? WHERE PRODUCTID = ?";
    $req = $db->prepare($sql);
    $req->execute(array($QUANTITY,$QUANTITY,$PRODUCTID));
    /* 
    + UPDATE [ICPRODUCT] 
    set [ONHAND] = [ONHAND]-@1,[TOTALUSE] = [TOTALUSE]+@2  WHERE [PRODUCTID]=@3"
    */

    $LASTUSE;
    $sql = "UPDATE ICLOCATION set LOCONHAND = LOCONHAND - ?,TOTALUSE = TOTALUSE + ?,LASTUSE = ? 
            WHERE LOCID = ? AND PRODUCTID = ?";
    $req = $db->prepare($sql);  
    $req->execute(array($QUANTITY,$QUANTITY,$LASTUSE,$LOCID,$PRODUCTID));
    /*        
    + UPDATE [ICLOCATION] 
    set [LOCONHAND] = [LOCONHAND]-@1,[TOTALUSE] = [TOTALUSE]+@2,[LASTUSE] = @3  WHERE [LOCID]=@4 AND [PRODUCTID]=@5"
    */

     $line++; 
    }

    $GLNO;
    $LINNO = 1;
    $GLDESC = "Issue";
    $GLDATE = $nowdate;
    $GLYEAR = date("Y");
    $GLMONTH = date("m"); 
    $ACCNO = 77000;
    $GLAMT = $totalamount;
    $DEBIT = $totalamount;
    $CREDIT = 0;
    $DOCNO;
    $USERADD = $author;
    $DATEADD = $now;
    $GLPOST = "N";
    $GLTYPE = "J";
    $APPID = "IC";
    $REMARKS = "";
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
    COST_CENTER,IS_UPDATED,LOCAID,CLEAR_AMOUNT,OTHER_PRICE,
    LINK_LINE
    ) 
    VALUES (
    ?,?,?,?,?,
    ?,?,?,?,?,
    ?,?,?,?,?,
    ?,?,?,?,?,
    ?,?,?,?,?,
    ?)";
    /*
    + INSERT INTO [GLTRAN] 1 (77000)
    ([GLNO],      => Year + month + GLNO
    [LINNO],      => 1
    [GLDESC],     => “Issue” 
    [GLDATE],     => GetDate (YYYY-MM-dd)  
    [GLYEAR],     => Year

    [GLMONTH],     => Month
    [ACCNO],     => 77000
    [GLAMT],     => Total Amount
    [DEBIT],      => Total Amount
    [CREDIT],     => 0

    [DOCNO],     => “IS” 13 Digit 
    [USERADD],     => User Create
    [DATEADD],     => Date Add 
    [GLPOST],     => “N”
    [GLTYPE],     => “J”

    [APPID],      => “IC”
    [REMARKS],     => Note
    [CUSTID],     => Null
    [VENDID],     => Null
    [FILEID],      => Blank

    [COST_CENTER],    => Null
    [IS_UPDATED],    => Null
    [LOCID],     => Issue location
    [CLEAR_AMOUNT],   => 0
    [OTHER_PRICE],     => 0

    [LINK_LINE],     => 0
    */


    $GLNO;
    $LINNO = 2;
    $GLDESC = "Issue";
    $GLDATE = $nowdate;
    $GLYEAR = date("Y");
    $GLMONTH = date("m");
    $ACCNO = "17000";
    $GLAMT = $totalamount;
    $DEBIT = 0;
    $CREDIT = $totalamount;
    $DOCNO;
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
        ?,?,?,?
    ";
    /*
    + INSERT INTO [GLTRAN] 2 (17000)
    ([GLNO],      => Year + month + GLNO
    [LINNO],      => 2
    [GLDESC],     => “Issue” 
    [GLDATE],     => GetDate (YYYY-MM-dd)  
    [GLYEAR],     => Year

    [GLMONTH],     => Month
    [ACCNO],     => 17000
    [GLAMT],     => Total Amount
    [DEBIT],      => 0
    [CREDIT],     => Total Amount

    [DOCNO],     => “IS” 13 Digit 
    [USERADD],     => User Create
    [DATEADD],     => Date Add 
    [APPID],      => IC
    [REMARKS],     => Note

    [CUSTID],     => Null
    [VENDID],     => Null
    [FILEID],      => Blank
    [COST_CENTER],    => Null
    [IS_UPDATED],    => Null

    [LOCID],     => Issue location
    [CLEAR_AMOUNT],   => 0
    [OTHER_PRICE],     => 0
    [LINK_LINE],     => 0
    */

    $sql = "UPDATE SYSDATA SET NUM2=NUM2+1 WHERE ltrim(rtrim(SYSID))='AR’";
    $req = $db->prepare($sql);
    $req->execute(array());
    /*
    + UPDATE SYSDATA 
    SET NUM1=NUM1+1 
    WHERE ltrim(rtrim(SYSID))='AR'
    */

    $sql = "UPDATE SYSDATE SET NUM2=NUM2+1 WHERE ltrim(rtrim(SYSID))='IC'";
    $req = $db->prepare($sql);
    $req->execute(array());
    /*
    + UPDATE SYSDATA SET
    NUM2=NUM2+1 WHERE ltrim(rtrim(SYSID))='IC'
    */

    $HAS_TRANSACTION;
    $CURR_ID;
    $sql = "UPDATE SYSSETUPCURRENCY set HAS_TRANSACTION = ? WHERE CURR_ID =?";
    $req = $db->prepare($sql);
    $req->execute(array(HAS_TRANSACTION,$CURR_ID));
    /*
    + UPDATE [SYSSETUPCURRENCY] 
    set [HAS_TRANSACTION] = @1  WHERE [CURR_ID]=@2"
    */

    $GLNO;
    $sql = "UPDATE GLSYS set GLNO = GLNO+?";
    $req = $db->prepare($sql);
    $req->execute(array($GLNO));
    /*
        + UPDATE [GLSYS] 
        set [GLNO] = [GLNO]+@1
        */
}

 
?>

