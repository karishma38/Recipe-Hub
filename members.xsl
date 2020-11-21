<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
        <style>
        table{
            border-collapse: collapse;
            color: #ffffff;			
        }
        th, td{
            padding: 10px;
            text-align:center;
			
        }
        h2{
            color: #ffffff;
        }
		td{
		background-color:#00000075;
		}
        </style>

        <body>
        <table border="1">
            <tr bgcolor="lightblue" style="color:#000;">
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Branch</th>
                <th>E-mail</th>
            </tr>
            <xsl:for-each select="members/member">
            <xsl:sort select="rollno" order="ascending" data-type="number"/>
            <tr>
                <td><xsl:value-of select="rollno"/></td>
                <td><xsl:value-of select="fname"/>&#160;<xsl:value-of select="lname"/></td>
                <td><xsl:value-of select="age"/></td>
                <td><xsl:value-of select="gender"/></td>
                <td><xsl:value-of select="branch"/></td>
                <td style="font-size:17px;"><xsl:value-of select="mail"/></td>
            </tr>
            </xsl:for-each>
        </table>
        </body>
        </html>
    </xsl:template>
</xsl:stylesheet>