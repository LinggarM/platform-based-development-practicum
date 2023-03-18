<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
	<xsl:output method="html"/>
	<xsl:template match="/">
		<html>
			<head>
				<title>hasil style daftar-buku.xsl</title>
			</head>
			<body style="font-family:Arial">
				<table border="1">
					<tr bgcolor="blue">
						<th>Judul</th>
						<th>Pengarang</th>
					</tr>
					<xsl:for-each select="daftar-buku/buku">
						<tr>
							<td>
								<xsl:value-of select="judul"/>
							</td>
							<td>
								<xsl:value-of select="pengarang"/>
							</td>
						</tr>
					</xsl:for-each>
				</table>
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>