import * as S from './styles'

type MainTextProps = {
  children: React.ReactNode
}

const MainText = ({ children }: MainTextProps) => (
  <S.MainText>{children}</S.MainText>
)

export default MainText
