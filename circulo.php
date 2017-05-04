<?php 
/**
* Clase circulo
*/
class Circulo /*extends AnotherClass*/
{

	private $raio;
	private $x;
	private $y;
	
	public function __construct(float $raio = 1, float $x=0, float $y=0)
	{	
		/*condicao redundante*/
		if (!is_numeric($raio) || !is_numeric($x) || !is_numeric($y)) {
			throw new Exception("O radio deve ser um valor numerico");
		}

		$this->raio = $raio;
		$this->x = $x;
		$this->y = $y;
	}

	/**
	 * retorna o raio do circulo
	 *
	 * @return     number  radio do circulo
	 */
	public function raio():float{
		return $this->raio;
	}

	/**
	 * retorna a area do circulo
	 *
	 * @return     number  area do circulo
	 */
	public function area():float{
		$area = pi() * pow($this->raio, 2);
		return $area;
	}

	/**
	 * retorna o diametro do circulo
	 *
	 * @return     number  diametro
	 */
	public function diametro():float{
		$diametro = 2 * $this->raio;
		return $diametro;
	}

	/**
	 * Perimetro do circulo (2 x π x r)
	 *
	 * @return     boolean|integer  perimetro do circulo
	 */
	public function perimetro():float{
		$perimetro = 2 * pi() * $this->raio;
		return $perimetro;
	}

	/**
	 * Dados um par de coordenadas (x,y) que expressam a posicao de um ponto a
	 * funcao emRango devolve true se o ponto se encontra dentro da area do
	 * circulo e false se nao se encontrar
	 *
	 * @param      float  $x      coordenada do ponto no eixo dos x
	 * @param      float  $y      coordenada do ponto no eixo dos y
	 *
	 * @return     bool   se o ponto se encontra ou nao dentro do circulo
	 */
	public function emRango(float $x, float $y):bool{
		$distancia = static::distancia($x, $y, $this->x, $this->y);

		if ($distancia > $this->raio) {
			return false;
		}else{
			return true;
		}
	}
	
	/**
	 * dados dois pontos indicados pelos pares de coordenadas (x1,y1) e (x2,y2)
	 * a funcao distancia devolve a distancia entre eles. este metodo e
	 * estatico.
	 *
	 * @param      integer  $x1     coordenada do ponto 1 no eixo dos x
	 * @param      integer  $y1     coordenada do ponto 1 no eixo dos y
	 * @param      integer  $x2     coordenada do ponto 2 no eixo dos x
	 * @param      integer  $y2     coordenada do ponto 2 no eixo dos y
	 *
	 * @return     float    a distancia entre os dois pontos
	 */
	private static function distancia($x1, $y1, $x2, $y2):float{
		$distancia = (pow(($x2-$x1),2) + pow(($y2-$y1),2));
		$distancia = sqrt($distancia);
		return $distancia;
	}
	
}
?>