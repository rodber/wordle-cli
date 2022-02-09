build:
	build-words

download-words:
	curl -o wordlist/en https://raw.githubusercontent.com/dwyl/english-words/master/words_alpha.txt
	curl -o wordlist/es https://raw.githubusercontent.com/JorgeDuenasLerin/diccionario-espanol-txt/master/0_palabras_todas.txt
	curl -o wordlist/pt https://raw.githubusercontent.com/pythonprobr/palavras/master/palavras.txt