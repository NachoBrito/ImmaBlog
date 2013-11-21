<?php
namespace NachoBrito\SpamFilterBundle\Services;
/**
 * Description of StopWordsProvider
 *
 * @author nacho
 */
class StopWordsProvider
{

    private $_stopwords = false;
    
    /**
     * 
     */
    public function getStopWords(){
        if(!is_array($this->_stopwords)){
            $this->_stopwords = $this->buildStopWords();
        }
        return $this->_stopwords;
    }
    /**
     * 
     * @return array stop words
     */
    private function buildStopWords()
    {
        $sw = '
        no
        de
        que
        se
        al
        art
        sr
        ni
        del
        ir
        un
        una
        unas
        unos
        uno
        sobre
        todo
        también
        tras
        otro
        algún
        alguno
        alguna
        algunos
        algunas
        ser
        es
        soy
        eres
        somos
        sois
        estoy
        esta
        estamos
        estais
        estan
        como
        en
        para
        atras
        porque
        por 
        qué
        estado
        estaba
        ante
        antes
        siendo
        ambos
        pero
        por
        poder
        puede
        puedo
        podemos
        podeis
        pueden
        fui
        fue
        fuimos
        fueron
        hacer
        hago
        hace
        hacemos
        haceis
        hacen
        cada
        fin
        incluso
        primero
        desde
        conseguir
        consigo
        consigue
        consigues
        conseguimos
        consiguen
        ir
        voy
        va
        vamos
        vais
        van
        vaya
        gueno
        ha
        tener
        tengo
        tiene
        tenemos
        teneis
        tienen
        el
        la
        lo
        las
        los
        su
        aqui
        mio
        tuyo
        ellos
        ellas
        nos
        nosotros
        vosotros
        vosotras
        si
        dentro
        solo
        solamente
        saber
        sabes
        sabe
        sabemos
        sabeis
        saben
        ultimo
        largo
        bastante
        haces
        muchos
        aquellos
        aquellas
        sus
        entonces
        tiempo
        verdad
        verdadero
        verdadera 	
        cierto
        ciertos
        cierta
        ciertas
        intentar
        intento
        intenta
        intentas
        intentamos
        intentais
        intentan
        dos
        bajo
        arriba
        encima
        usar
        uso
        usas
        usa
        usamos
        usais
        usan
        emplear
        valor
        muy
        era
        eras
        eramos
        eran
        modo
        bien
        cual
        cuando
        donde
        mientras
        quien
        con
        entre
        sin
        podria
        podrias
        podriamos
        podrian
        podriais
        yo
        aquel';

        return mb_split("[\s]+", $sw);
    }
}
