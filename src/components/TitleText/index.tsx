import * as S from './styles'

type TitleTextProps = {
  children: React.ReactNode
}

const TitleText = ({ children }: TitleTextProps) => (
  <S.TitleText>{children}</S.TitleText>
)

export default TitleText
