(function(){var a=sfx["vector.templates"];a.AreaGlass='<T><C><Po P="{B P}" F="{B F}" S="{B S}" ST="{B ST}"/><Pl P="{B PT}" S="{B S}" ST="{B ST}"/><Po P="{B P}" F="{N}" A="0.5" ST="{B ST}"><Po.S><L E="0,1" S="0,0"><G C="#FFFFFFFF" O="0"/><G C="#FFFFFFFF" O="0.5"/><G C="#4C787878" O="1"/></L></Po.S></Po><Po P="{B P}" S="#00000000" A="0.8" ST="{B ST}" ><Po.F><L E="0,1" S="0,0"><G C="#bFFFFFFF" O="0"/><G C="#11FFFFFF" O="0.59"/><G C="#00FFFFFF" O="0.8"/></L></Po.F></Po></C></T>';a.AreaBasic='<T><T.R><D K="cfxDefStrokeThickness">3</D></T.R><Po P="{B P}" F="{B F}" S="{B S}" ST="{B ST}"/></T>';
a.BarGlass='<T><T.R><T K="cfxLastStack"><B F="{B F}" S="{B S}" CR="3,3,0,0"><B A="0.8" CR="3,3,0,0"><B.F><L E="0,1" S="0,0"><G C="#99FFFFFF" O="0"/><G C="#11FFFFFF" O="0.2999"/><G C="#00FFFFFF" O="1"/></L></B.F></B></B></T><T K="cfxFirstStack"><B F="{B F}" S="{B S}"/></T></T.R><B F="{B F}" S="{B S}" CR="3,3,0,0"><B A="0.8" CR="3,3,0,0"><B.F><L E="0,1" S="0,0"><G C="#99FFFFFF" O="0"/><G C="#11FFFFFF" O="0.2999"/><G C="#00FFFFFF" O="0.3"/></L></B.F></B></B></T>';a.BarSpotlight='<T><B F="{B F}" S="{B S}"><B><B.F><L S="0,0" E="1,0"><G C="#22FFFFFF" O="0"/><G C="#66FFFFFF" O="0.25"/><G C="#33FFFFFF" O="0.59"/><G C="#00000000" O="0.60"/><G C="#00000000" O="1"/></L></B.F></B></B></T>';
a.BarLights='<T><B x:Name="Bar" W="{B Width}" H="{B Height}" rT="{B Transform}" A="{B Opacity}" F="{B F}" S="{B S}" ST="{B ST}" CR="10,10,0,0"><B ST="0" x:Name="Shadow"><B.F><L E="1,0.5" S="0,0.5"><G O="0" C="#00FFFFFF"/><G O="0.8" C="#4CFFFFFF"/><G C="#2D000000" O="0.95"/><G C="#00000000" O="1"/></L></B.F><B x:Name="Glare" HorizontalAlignment="Left" M="2,2,0,0" W="34" ST="0" CR="10,0,0,0"><B.F><L E="1,0.5" S="0,0.5"><G C="#0CFFFFFF" O="0"/><G C="#7FFFFFFF" O="0.25"/><G C="#00FFFFFF" O="0.5"/><G C="#00FFFFFF" O="1"/></L></B.F></B></B></B></T>';
a.BarBasic='<T><B W="{B Width}" H="{B Height}" rT="{B Transform}" A="{B Opacity}" F="{B F}" S="{B S}" ST="{B ST}"></B></T>';a.BorderBasic='<T><T.R><Th K="externalMargin">0</Th><Th K="plotMargin">2</Th><Th K="internalRectMargin">2</Th><T K="internalRect"><B F="{B F}" S="{B S}"/></T><T K="internal"><Line S="{B S}" X1="{B X1}" X2="{B X2}" Y1="{B Y1}" Y2="{B Y2}"/></T></T.R><B F="{B F}" S="{B S}"/></T>';a.BorderRound='<T><T.R><Th K="externalMargin">16</Th><Th K="plotMargin">4</Th><Th K="internalRectMargin">2</Th><T K="internalRect"><B CR="6" F="{B F}" S="{B S}" CP="0.5"/></T><T K="internal"><Line S="{B S}" X1="{B X1}" X2="{B X2}" Y1="{B Y1}" Y2="{B Y2}"/></T></T.R><B CR="14" F="{B F}" S="{B S}"/></T>';
a.BorderRoundShadow='<T><T.R><Th K="externalMargin">16</Th><Th K="plotMargin">4,4,16,16</Th><Th K="internalRectMargin">2</Th><T K="internalRect"><B CR="4" F="{B F}" S="{B S}"/></T><T K="internal"><Line S="{B S}" X1="{B X1}" X2="{B X2}" Y1="{B Y1}" Y2="{B Y2}"/></T></T.R><g><g.CD><CD W="*"/><CD W="12"/></g.CD><g.RD><RD H="*"/><RD H="12"/></g.RD><B CR="24" F="#606060"><B.BE><BBE R="1.6"/></B.BE><B.rT><TT X="4" Y="4" RelativeScale="false"/></B.rT></B><B CR="24" F="{B F}" S="{B S}"/></g></T>';a.BubbleBasic=
'<T><E F="{B F}" S="{B S}" ST="{B ST}"/></T>';a.CurveAreaBasic='<T><P D="{B G}" S="{B S}" F="{B F}" ST="{B ST}"/></T>';a.CurveBasic='<T><P D="{B G}" S="{B S}" ST="{B ST}" O="true"/></T>';a.DoughnutSpotlight='<T><T.R><T K="cfxForegroundFull"><C c="{B ClipGeometry}"><E S="{N}" A="0.6" rTO="0.5,0"><E.F><L E="0.5,1" S="0.5,0"><G C="#C8FFFFFF" O="0"/><G C="#C8FFFFFF" O="0.003"/><G C="#34FFFFFF" O="1"/></L></E.F><E.rT><TS SY="0.4" SX="0.6"/></E.rT></E></C><C c="{B ClipGeometry}"><E A="0.75" ST="1"><E.F><R><R.RT><TG><TS CX="0.5" CY="0.5" SX="1.074" SY="1.074"/><TT X="-0.037" Y="-0.029"/></TG></R.RT><G C="#00000000" O="0"/><G C="#00000000" O="0.99"/><G C="#67000000" O="1"/></R></E.F><E.S><L E="0.829,0.87" S="0.203,0.082"><G C="#4CFFFFFF" O="0"/><G C="#00FFFFFF" O="1"/></L></E.S></E><E S="{N}" A="0.3" rTO="0.5,0"><E.F><L S="0,0" E="1,1"><L.RT><TG><TS CX="0.5" CY="0.5" SX="1.769" SY="2.077"/><TT X="0.235" Y="0.299"/></TG></L.RT><G C="#66FFFFFF" O="0"/><G C="#00FFFFFF" O="0.652"/><G C="#22FFFFFF" O="0.982"/></L></E.F></E></C></T></T.R><C><P D="{B G}" F="{B F}" S="{B S}"/><P D="{B G}" F="{N}" A="0.2"><P.S><L E="1,1" S="0,0"><G C="#FFFFFFFF" O="0"/><G C="#FF000000" O="1"/></L></P.S></P></C></T>';
a.DoughnutMetal='<T><T.R><Th K="cfxBackgroundMargin">8</Th><T K="cfxBackgroundFull"><P D="{B G}"><P.F><L><G C="#FFFFFF" O="0"/><G C="#000000" O="1"/></L></P.F></P></T><T K="cfxForegroundFull"><C c="{B ClipGeometry}"><V VW="100" VH="100"><P D="B2,2 96,96 215 110 C70,30 30,30 10.67,22.56 Z" F="#80FFFFFF"/></V></C></T><T K="cfxRay"><Line X1="{B X1}" Y1="{B Y1}" X2="{B X2}" Y2="{B Y2}" S="#FFFFFF" ST="2"/></T></T.R><P D="{B G}" F="{B F}" S="{B S}"/></T>';a.GanttBasic=a.BarBasic;a.LineBasic='<T><Pl P="{B P}" S="{B S}" ST="{B ST}"/></T>';
a.PieSpotlight='<T><T.R><T K="cfxForegroundFull"><C c="{B CE}"><E A="0.75" ST="1"><E.F><R><R.RT><TG><TS CX="0.5" CY="0.5" SX="1.074" SY="1.074"/><TT X="-0.037" Y="-0.029"/></TG></R.RT><G C="#00000000" O="0"/><G C="#00000000" O="0.99"/><G C="#67000000" O="1"/></R></E.F><E.S><L E="0.829,0.87" S="0.203,0.082"><G C="#4CFFFFFF" O="0"/><G C="#00FFFFFF" O="1"/></L></E.S></E><E S="{N}" A="0.6" rTO="0.5,0"><E.F><L E="0.5,1" S="0.5,0"><G C="#C8FFFFFF" O="0"/><G C="#C8FFFFFF" O="0.003"/><G C="#34FFFFFF" O="1"/></L></E.F><E.rT><TS SY="0.4" SX="0.6"/></E.rT></E><E S="{N}" A="0.3" rTO="0.5,0"><E.F><L S="0,0" E="1,1"><L.RT><TG><TS CX="0.5" CY="0.5" SX="1.769" SY="2.077"/><TT X="0.235" Y="0.299"/></TG></L.RT><G C="#66FFFFFF" O="0"/><G C="#00FFFFFF" O="0.652"/><G C="#22FFFFFF" O="0.982"/></L></E.F></E></C></T></T.R><C><P D="{B G}" F="{B F}" S="{B S}"/><P D="{B G}" F="{N}" A="0.2"><P.S><L E="1,1" S="0,0"><G C="#FFFFFFFF" O="0"/><G C="#FF000000" O="1"/></L></P.S></P></C></T>';
a.PieMetal='<T><T.R><Th K="cfxBackgroundMargin">8</Th><T K="cfxBackgroundFull"><E><E.F><L><G C="#FFFFFF" O="0"/><G C="#000000" O="1"/></L></E.F></E></T><T K="cfxForegroundFull"><V VW="100" VH="100"><P D="B2,2 96,96 215 110 C70,30 30,30 10.67,22.56 Z" F="#80FFFFFF"/></V></T><T K="cfxRay"><Line X1="{B X1}" Y1="{B Y1}" X2="{B X2}" Y2="{B Y2}" S="#FFFFFF" ST="2"/></T></T.R><P D="{B G}" F="{B F}" S="{B S}"/></T>';a.PieBasic='<T><P D="{B G}" F="{B F}" S="{B S}" ST="{B ST}"/></T>';a.DoughnutBasic=a.PieBasic;
a.PyramidBasic='<T><Po P="{B P}" S="{B S}" ST="{B ST}"  F="{B F}"/></T>'})();
