<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
	<xsl:output method="html"/>
	<xsl:template match="/">
		<html>
			<head>
				<title>hasil style daftar-mahasiswa.xsl</title>
			</head>
			<body style="font-family:Arial">
				<table border="1">
					<tr bgcolor="blue">
						<th>NIM</th>
						<th>Nama</th>
						<th>Asal Provinsi</th>
					</tr>
					<xsl:for-each select="daftar-mahasiswa/mahasiswa">
						<tr>
							<td>
								<xsl:value-of select="nim"/>
							</td>
							<td>
								<xsl:value-of select="nama"/>
							</td>
							<td>
								<xsl:value-of select="provinsi"/>
							</td>
						</tr>
					</xsl:for-each>
				</table>
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>